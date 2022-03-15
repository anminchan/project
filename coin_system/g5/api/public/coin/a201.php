<?php
//include_once('./_common.php');
include_once('../../../common.php');
header("Content-Type: application/json; charset=utf-8");

include_once('../../access-token/include.php');

$method = $_SERVER["REQUEST_METHOD"];
$method_approval[] = "GET";
$data = array();
if(!in_array($method, $method_approval)) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'REQUEST METHOD 오류 입니다.', 'data' => ""];
    die(json_encode($json_data));
}

$address = isset($_GET['address']) ? trim($_GET['address']) : '';

if( !$address) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => '필수 키가 정보가 없습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$sql = " select * from {$g5['member_table']} where mb_wallet_addr = '$address' ";
$row = sql_fetch($sql);
if( !$row['mb_no'] ) {
    $json_data = ['success' => true, 'code' => "202", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $row['mb_level']!='2' || $row['mb_leave_date']!='' || $row['mb_intercept_date']!='' ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '탈퇴/차단 회원이 입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$member_info = ['mb_id' => $row['mb_id'], 'mb_coin' => $row['mb_coin'] ];
$json_data = ['success' => true, 'code' => "200", 'message' => '정상적으로 처리 되었습니다.', 'error' => null, 'data' => $member_info];

die(json_encode($json_data));

?>