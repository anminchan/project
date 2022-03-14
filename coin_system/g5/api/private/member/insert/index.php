<?php

define('_PURENESS_', true);
define('IS_RTN_PAGE', 'YES');
include_once('../../../../common.php');
//include_once(TB_LIB_PATH.'/json.lib.php');
header("Content-Type: application/json; charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);ini_set('display_errors', '1');

include_once('../../access-token/include.php');

$check_required = true;
//필수항목체크
$required = array();
array_push($required, 'tx_id','mb_id','mb_password','mb_name','mb_email','mb_hp','mb_bank_nm','mb_bank_account','mb_bank_holder');
foreach ($required as $key => $value) {
    if(!isset($_POST[$value]) || trim($_POST[$value]) == null) {
        $check_required = false;
        $msg = $value.' 필수값이 누락되었습니다.';
        break;
    }
}
unset($required);
//검증오류 발생시 처리
if(!$check_required) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => $msg, 'data' => ""];
    die(json_encode($json_data));
}

$mb = get_member($_POST['mb_id']);
if (isset($mb['mb_id']) && $mb['mb_id']){
    $json_data = ['success' => true, 'code' => "200", 'message' => '이미 존재하는 회원아이디입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$mb_address = getRandStr(34);
for($i=0; $row=100; $i++) {
    $result = sql_fetch(" select count(*)as cnt from {$g5['member_table']} where mb_wallet_addr = '$mb_address' '");
    if(!$result['cnt']){
        $mb_address = getRandStr(34);
        break;
    }
}

$sql = " insert into {$g5['member_table']}
                set mb_id = '{$_POST['mb_id']}',
                mb_password = '".get_encrypt_string($_POST['mb_password'])."',
                mb_name = '{$_POST['mb_name']}',
                mb_email = '{$_POST['mb_email']}',
                mb_hp = '{$_POST['mb_hp']}',
                mb_bank_nm = '{$_POST['mb_bank_nm']}',
                mb_bank_account = '{$_POST['mb_bank_account']}',
                mb_bank_holder = '{$_POST['mb_bank_holder']}',
                mb_ip = '{$_SERVER['REMOTE_ADDR']}',
                mb_wallet_addr = '{$mb_address}',
                mb_datetime = '".G5_TIME_YMDHIS."' ";
sql_query($sql);

$mb = sql_fetch(" select * from {$g5['member_table']} where mb_id = '{$_POST['mb_id']}' ");
if($mb) {
    $member_info = ['ADDRESS' => $mb_address];
    $json_data = ['success' => true, 'code' => "200", 'message' => '회원 가입 되었습니다.', 'error' => null, 'data' => $member_info];
} else {
    $msg = '회원 가입에 실패했습니다.';
    $json_data = ['success' => true, 'code' => "400", 'message' => 'Bad Request', 'error' => $msg, 'data' => ''];
}

die(json_encode($json_data));
exit;
?>
