<?php
//include_once('./_common.php');
include_once('../../../../common.php');
header("Content-Type: application/json; charset=utf-8");

$mb_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';

if( !$mb_id ) {
    $json_data = ['success' => true, 'code' => "200", 'error' => '조회 상품키가 없습니다', 'data  ' => ''];
    die(json_encode($json_data));
}


$sql = " select * from {$g5['member_table']} where mb_id = '$mb_id' ";

$row = sql_fetch($sql);
if( !$row['index_no'] ) {
    $json_data = ['success' => true, 'code' => "200", 'error' => '조회된 상품키가 없습니다', 'data  ' => ''];
    die(json_encode($json_data));
}

$member_info = ['sc_type' => $row['sc_type'], 'zone' => $row['zone'], 'sc_island_failure' => $row['sc_island_failure'], 'sc_amt' => $row['sc_amt'], 'sc_each_use' => $row['sc_each_use'] ];

$json_data = ['success' => true, 'code' => "200", 'error' => '', 'data  ' => $member_info];

die(json_encode($json_data));

?>