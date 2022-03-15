<?php
//include_once('./_common.php');
include_once('../../../common.php');
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

if( !$tx_id) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => '필수 키가 정보가 없습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$sql = " select count(*)as cnt from {$g5['member_table']} where mb_level = 2 and mb_leave_date = '' and mb_intercept_date = ''  ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$sql = " select * from {$g5['member_table']} where mb_level = 2 and mb_leave_date = '' and mb_intercept_date = ''  ";
$result = sql_query($sql);

for(++$i; $row=sql_fetch_array($result); $i++)
{
    array_push($data, array('mb_id' => $row['mb_id'],
        'mb_name' => $row['mb_name'],
        'mb_email' => $row['mb_email'],
        'mb_hp' => $row['mb_hp'],
        'mb_bank_nm' => $row['mb_bank_nm'],
        'mb_bank_account' => $row['mb_bank_account'],
        'mb_bank_holder' => $row['mb_bank_holder'],
        'mb_wallet_addr' => $row['mb_wallet_addr'],
        'mb_datetime' => $row['mb_datetime']));
}

$info = ['pageIndex' => '1', 'totalPageCount' => $total_count, 'rowsPerPage' => '100', 'member_list' => $data];
$json_data = ['success' => true, 'code' => "200", 'message' => '정상적으로 조회 되었습니다.', 'error' => null, 'data' => $info];
die(json_encode($json_data));
exit();

?>