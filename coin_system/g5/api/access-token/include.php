<?php
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

$headers = apache_request_headers();
$token_txt = $headers['Authorization'];
$token_txt = substr($token_txt,7);

$expiryDateToken = date('Y-m-d');
$sql = "select seller_code, api_secretKey, client_server_ip from shop_seller_api where accessToken = '{$token_txt}' and expiryDateToken = '{$expiryDateToken}'";
$row = sql_fetch($sql);
if( !$row['seller_code'] || !$row['api_secretKey'] ) {
    $json_data = ['error' => 'api Auth error'];
    die(json_encode($json_data));
}

$client_ip = getRealClientIp();
$client_server_ip = explode(",", trim($row['client_server_ip']));
if( !in_array($client_ip, $client_server_ip) ) {
    $json_data = ['resultCode' => '400', 'error' => 'The use of the api has been discontinued (unregistered) or the ip is not allowed', 'ip' => $client_ip];
    die(json_encode($json_data));
}

$iv = '12345678'.date('Ymd');
$decrypted = openssl_decrypt( base64_decode( base64_decode($token_txt) ), 'aes-256-cbc', $row['api_secretKey'], OPENSSL_RAW_DATA, $iv );
if( $row['seller_code'] != $decrypted ) {
    $json_data = ['error' => 'api token error'];
    die(json_encode($json_data));
}
$seller_code = $decrypted;
$_SESSION['ss_mb_id'] = get_seller_cd($seller_code, 'mb_id')['mb_id'];

$requestData = file_get_contents('php://input'); 
$requestData = json_decode($requestData, true);
?>
