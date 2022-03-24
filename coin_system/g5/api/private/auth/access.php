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
$client_ip = getRealClientIp();

$client_server_ip = explode(",", trim($config['cf_4']));

/*$json_data = ['success' => in_array($client_ip, $client_server_ip), 'code' => "401", 'message' => $client_ip, 'error' => $config['cf_4'], 'data' => ""];
die(json_encode($json_data));*/

if( !in_array($client_ip, $client_server_ip) ) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'The use of the api has been discontinued (unregistered) or the ip is not allowed', 'data' => ""];
    die(json_encode($json_data));
}

if( $auth_txt != trim($config['cf_2']) ) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'refresh token 정보가 잘못되었습니다.', 'data' => ""];
    die(json_encode($json_data));
}

// accesstoken 생성
$accesstoken = getJWTHashing(1);

$sql = " update {$g5['config_table']} set cf_3 = '{$accesstoken}' ";
sql_query($sql);

$info = ['access_token' => $accesstoken];
$json_data = ['success' => true, 'code' => "200", 'message' => '전송되었습니다.', 'error' => null, 'data' => $info];

die(json_encode($json_data));
//print_r($requestData); 
exit;
?>
