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

$tx_id = isset($requestData['tx_id']) ? trim($requestData['tx_id']) : '';
$mb_id = isset($requestData['mb_id']) ? trim($requestData['mb_id']) : '';

if( !$mb_id || !$tx_id) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => '필수 키가 정보가 없습니다.', 'data' => ""];
    die(json_encode($json_data));
}

$mb = get_member($mb_id);
if( !$mb['mb_no'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level']!='2' || $mb['mb_leave_date']!='' || $mb['mb_intercept_date']!='' ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '탈퇴/차단 회원이 입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$member_info = ['mb_id' => $mb['mb_id'], 'mb_name' => $mb['mb_name'], 'mb_email' => $mb['mb_email'], 'mb_hp' => $mb['mb_hp'], 'mb_bank_nm' => $mb['mb_bank_nm']
    , 'mb_bank_nm' => $mb['mb_bank_nm']
    , 'mb_bank_account' => $mb['mb_bank_account']
    , 'mb_bank_holder' => $mb['mb_bank_holder']
    , 'mb_banks' => ($mb['mb_bank_nm'].' '.$mb['mb_bank_holder'].' '.$mb['mb_bank_holder'])
    , 'mb_wallet_addr' => $mb['mb_wallet_addr']
    , 'mb_datetime' => $mb['mb_datetime']];
$json_data = ['success' => true, 'code' => "200", 'message' => '회원 정보가 존재합니다.', 'error' => null, 'data' => $member_info];

die(json_encode($json_data));

?>