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

$client_ip = getRealClientIp();
$client_server_ip = explode(",", trim($config['cf_4']));
if( !in_array($client_ip, $client_server_ip) ) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'The use of the api has been discontinued (unregistered) or the ip is not allowed', 'data' => ""];
    die(json_encode($json_data));
}

if( $token_txt != trim($config['cf_3']) ) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'accessToken 정보가 잘못되었습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$decrypted = getJWTDehashing($token_txt);
if(!is_array($decrypted)){
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => $decrypted, 'data' => ""];
    die(json_encode($json_data));
}

$requestData = file_get_contents('php://input');
$requestData = json_decode($requestData, true);
?>
