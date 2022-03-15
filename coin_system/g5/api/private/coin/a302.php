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
array_push($required, 'tx_id','mb_id','to_address','balance');
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

$mb = get_member($_POST['mb_id']);
if( !$mb['mb_id'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level']!='2' || $mb['mb_leave_date']!='' || $mb['mb_intercept_date']!='' ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '탈퇴/차단 회원이 입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

// 전환코인과 보유코인 체크
if( $mb['mb_coin'] < $_POST['balance'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '전환코인이 보유수량보다 많습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$cr_account = $mb['mb_bank_nm'] . ' / ' . $mb['mb_bank_account'] . ' / ' . $mb['mb_bank_holder'];

$sql = " insert into {$g5['coin_req_table']}
            set mb_id = '{$mb['mb_id']}',
                mb_name = '{$mb['mb_name']}',
                cr_state = 5,
                cr_coin = '{$_POST['balance']}',
                cr_account = '$cr_account',
                cr_ip = '{$_SERVER['REMOTE_ADDR']}',
                cr_date = '" . G5_TIME_YMDHIS . "',
                cr_uptime = '" . G5_TIME_YMDHIS . "',
                cr_convert_date = '" . G5_TIME_YMDHIS . "' ";
sql_query($sql);
$cr_id = sql_insert_id();

$key = 'vg7eu1jg8fxhaff4odfgn3w2wzd2ovr2'; // 인증키
$hash = $cr_id.$mb['mb_id'].$key.date('ymd');
$checkkey = hash('sha256', $hash);

$sql_up = " update {$g5['coin_req_table']}
            set cr_balance = '$checkkey' where cr_id = '$cr_id' and mb_id = '{$mb['mb_id']}' ";
sql_query($sql_up);

// 사용자 코인 차감
$rtn = delete_coin($mb['mb_id'], $_POST['balance']);
if(!$rtn){
    sql_query(" delete {$g5['coin_req_table']} from where where cr_id = '$cr_id' and mb_id = '{$mb['mb_id']}' ");
    $json_data = ['success' => false, 'code' => "401", 'message' => '전환신청이 실패하였습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

$info = ['tx_id' => $checkkey];
$json_data = ['success' => true, 'code' => "200", 'message' => '전송되었습니다.', 'error' => null, 'data' => $info];

die(json_encode($json_data));
exit;
?>
