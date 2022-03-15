<?php
//include_once('./_common.php');
include_once('../../../../common.php');
header("Content-Type: application/json; charset=utf-8");

include_once('../../access-token/include.php');

$method = $_SERVER["REQUEST_METHOD"];
$method_approval[] = "POST";
$data = array();
if(!in_array($method, $method_approval)) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'REQUEST METHOD 오류 입니다.', 'data' => ""];
    die(json_encode($json_data));
}

$tx_id = isset($_POST['tx_id']) ? trim($_POST['tx_id']) : '';
$mb_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';

if( !$mb_id || !$tx_id) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => '필수 키가 정보가 없습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$mb = get_member($mb_id);
if( !$row['mb_no'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level']!='2' || $mb['mb_leave_date']!='' || $mb['mb_intercept_date']!='' ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '탈퇴/차단 회원이 입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$member_info = ['sc_type' => $row['sc_type'], 'zone' => $row['zone'], 'sc_island_failure' => $row['sc_island_failure'], 'sc_amt' => $row['sc_amt'], 'sc_each_use' => $row['sc_each_use'] ];
$json_data = ['success' => true, 'code' => "200", 'message' => '회원 정보가 존재합니다.', 'error' => null, 'data' => $member_info];

die(json_encode($json_data));

?>