<?php
//include_once('./_common.php');
include_once('../../../common.php');
header("Content-Type: application/json; charset=utf-8");

include_once('../../access-token/include.php');

$tx_id = isset($_POST['tx_id']) ? trim($_POST['tx_id']) : '';

$method = $_SERVER["REQUEST_METHOD"];
$method_approval[] = "POST";
$data = array();
if(!in_array($method, $method_approval)) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'REQUEST METHOD 오류 입니다.', 'data' => ""];
    die(json_encode($json_data));
}

if(!$tx_id) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => '필수 키가 정보가 없습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$sql = " select count(*)as cnt from {$g5['coin_req_table']} where cr_balance = '$tx_id' and cr_state = 5 ";
$result = sql_fetch($sql);
if( !$result['cnt'] ) {
    $json_data = ['success' => false, 'code' => "204", 'message' => '처리된 정보가 없습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$json_data = ['success' => true, 'code' => "200", 'message' => '정상적으로 처리 되었습니다.', 'error' => null, 'data' => ""];

die(json_encode($json_data));

?>