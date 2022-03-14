<?php

include_once('../../../common.php');
//include_once(TB_LIB_PATH.'/json.lib.php');
header("Content-Type: application/json; charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);ini_set('display_errors', '1');

function getRealClientIp() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    } else if(getenv('HTTP_X_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    } else if(getenv('HTTP_X_FORWARDED')) {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    } else if(getenv('HTTP_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    } else if(getenv('HTTP_FORWARDED')) {
        $ipaddress = getenv('HTTP_FORWARDED');
    } else if(getenv('REMOTE_ADDR')) {
        $ipaddress = getenv('REMOTE_ADDR');
    }
    return $ipaddress;
}

$json_data = array();

$headers = apache_request_headers();
$auth_txt = $headers['Authorization'];
//$auth_txt = base64_decode($auth_txt);
$api_secretKey_header = base64_decode(substr($auth_txt,6) . ':');
$api_secretKey_header = substr($api_secretKey_header, 0, -1);

$requestData = file_get_contents('php://input'); 
$requestData = json_decode($requestData, true);
$sellerCode = $requestData['sellerCode'];
$api_secretKey = $requestData['api_secretKey'];
// if( $api_secretKey_header != $api_secretKey ) {
//     $json_data = ['resultCode' => '400', 'error' => 'not matching api key'];
//     die(json_encode($json_data));
// }
$client_ip = getRealClientIp();
//$json_data = array('ip' => $client_ip);die(json_encode($json_data));

$expiryDateToken = date('Y-m-d');
$sql = "select client_server_ip, accessToken, expiryDateToken from shop_seller_api 
        where api_state = '1' and seller_code = '{$sellerCode}' and api_secretKey = '{$api_secretKey}'";
$row = sql_fetch($sql);
//$json_data['sql'] = $sql;
$client_server_ip = explode(",", trim($row['client_server_ip']));
if( !in_array($client_ip, $client_server_ip) ) {
    $json_data = ['resultCode' => '400', 'error' => 'The use of the api has been discontinued (unregistered) or the ip is not allowed', 'ip' => $client_ip];
    die(json_encode($json_data));
}
if( $row['accessToken'] && $expiryDateToken == $row['expiryDateToken'] ) {
    $json_data = ['resultCode' => '201', 'accessToken' => $row['accessToken']];
    die(json_encode($json_data));
}

$iv = '12345678'.date('Ymd');
$encrypted = base64_encode(base64_encode(openssl_encrypt($sellerCode, 'aes-256-cbc', $api_secretKey, OPENSSL_RAW_DATA, $iv)));
//$decrypted = openssl_decrypt( base64_decode( base64_decode($encrypted) ), 'aes-256-cbc', $api_secretKey, OPENSSL_RAW_DATA, $iv );

$sql = "update shop_seller_api set accessToken = '{$encrypted}', expiryDateToken = '{$expiryDateToken}' 
        where api_state = '1' and seller_code = '{$sellerCode}' and api_secretKey = '{$api_secretKey}'";
sql_query($sql);

$json_data = ['resultCode' => '200', 'accessToken' => $encrypted];

die(json_encode($json_data));
//print_r($requestData); 
exit;
?>
