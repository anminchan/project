<?php
//include_once('./_common.php');
include_once('../../../../common.php');
header("Content-Type: application/json; charset=utf-8");

$tx_id = isset($_POST['tx_id']) ? trim($_POST['tx_id']) : '';

if( !$tx_id) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => '필수 키가 정보가 없습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$sql = " select count(*)as cnt from {$g5['member_table']} ";
$result = sql_fetch($sql);

$member_info = ['totalPageCount' => $result['cnt'] ];
$json_data = ['success' => true, 'code' => "200", 'message' => '회회원 전체 회원수가 조회 되었습니다.', 'error' => null, 'data' => $member_info];

die(json_encode($json_data));

?>