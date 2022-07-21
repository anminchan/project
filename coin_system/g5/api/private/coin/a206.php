<?php
//include_once('./_common.php');
include_once('../../../common.php');
header("Content-Type: application/json; charset=utf-8");

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
include_once('../../access-token/include.php');

$method = $_SERVER["REQUEST_METHOD"];
$method_approval[] = "POST";
$data = array();
if(!in_array($method, $method_approval)) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'REQUEST METHOD 오류 입니다.', 'data' => ""];
    die(json_encode($json_data));
} else {
    $sql = " select * from {$g5['member_table']} where mb_level = 2 and mb_leave_date = '' and mb_intercept_date = ''  ";
    $result = sql_query($sql);

    for(++$i; $row=sql_fetch_array($result); $i++)
    {
        array_push($data, array('mb_id' => $row['mb_id'], 'mb_name' => $row['mb_name'], 'mb_coin' => $row['mb_coin']));
    }
}

$info = ['member_list' => $data];
$json_data = ['success' => true, 'code' => "200", 'message' => '정상적으로 조회 되었습니다.', 'error' => null, 'data' => $info];

die(json_encode($json_data));

exit;

?>