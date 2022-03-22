<?php

define('_PURENESS_', true);
define('IS_RTN_PAGE', 'YES');
include_once('../../../common.php');
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
    if(!isset($requestData[$value]) || trim($requestData[$value]) == null) {
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

$mb = get_member($requestData['mb_id']);
if( !$mb['mb_id'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level']!='2' || $mb['mb_leave_date']!='' || $mb['mb_intercept_date']!='' ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '탈퇴/차단 회원이 입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$common_query = '';
if($requestData['mb_password'])
    $common_query .= " , mb_password = '".get_encrypt_string($requestData['mb_password'])."' ";
if($requestData['mb_name']){
    $common_query .= " , mb_name = '".$requestData['mb_name']."' ";
    $common_query .= " , mb_nick = '".$requestData['mb_name']."' ";
}
if($requestData['mb_email'])
    $common_query .= " , mb_email = '".$requestData['mb_email']."' ";
if($requestData['mb_hp'])
    $common_query .= " , mb_hp = '".$requestData['mb_hp']."' ";
if($requestData['mb_bank_nm'])
    $common_query .= " , mb_bank_nm = '".$requestData['mb_bank_nm']."' ";
if($requestData['mb_bank_account'])
    $common_query .= " , mb_bank_account = '".$requestData['mb_bank_account']."' ";
if($requestData['mb_bank_holder'])
    $common_query .= " , mb_bank_holder = '".$requestData['mb_bank_holder']."' ";

if($common_query){
    $sql = " update {$g5['member_table']}
                set mb_memo = concat(mb_memo, \"\n회원정보수정(".G5_TIME_YMDHIS.")\")
                    {$common_query}
        where mb_id = '{$requestData['mb_id']}' ";
    sql_query($sql);
}

$json_data = ['success' => true, 'code' => "200", 'message' => '회원 수정 되었습니다.', 'error' => null, 'data' => ''];

die(json_encode($json_data));
exit;
?>
