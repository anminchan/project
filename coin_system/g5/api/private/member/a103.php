<?php

define('_PURENESS_', true);
define('IS_RTN_PAGE', 'YES');
include_once('../../../../common.php');
//include_once(TB_LIB_PATH.'/json.lib.php');
header("Content-Type: application/json; charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);ini_set('display_errors', '1');

include_once('../../access-token/include.php');

$method = $_SERVER["REQUEST_METHOD"];
$method_approval[] = "POST";
$data = array();
if(!in_array($method, $method_approval)) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'REQUEST METHOD 오류 입니다.', 'data' => ""];
    die(json_encode($json_data));
}

$check_required = true;
//필수항목체크
$required = array();
array_push($required, 'tx_id','mb_id');
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
if( !$mb['mb_id'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level']!='2' || $mb['mb_leave_date']!='' || $mb['mb_intercept_date']!='' ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '탈퇴/차단 회원이 입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$sql = " update {$g5['member_table']}
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

$json_data = ['success' => true, 'code' => "200", 'message' => '회원 수정 되었습니다.', 'error' => null, 'data' => ''];

die(json_encode($json_data));
exit;
?>
