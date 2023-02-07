<?php
/*
 * 코인신청
 * tx_id
 * mb_id
 * to_address
 * price
 */
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
array_push($required, 'tx_id','mb_id','to_address','price');
foreach ($required as $key => $value) {
    if(!isset($requestData[$value]) || trim($requestData[$value]) == null) {
        $check_required = false;
        $msg = $value.' 필수값이 누락되었습니다.';
        break;
    }
}
unset($required);

$price = isset($requestData['price']) ? preg_replace('/[^0-9]/', '', $requestData['price']) : 0;

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

if ($price <= 0){
    $json_data = ['success' => false, 'code' => "401", 'message' => '코인구매값이 잘못되었습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}else{
    $cr_account = $mb['mb_bank_nm'] . ' / ' . $mb['mb_bank_account'] . ' / ' . $mb['mb_bank_holder'];
    $cr_coin = $price/10000;

    $sql = " insert into {$g5['coin_req_table']}
            set mb_id = '{$mb['mb_id']}',
                mb_name = '{$mb['mb_name']}',             
                 cr_price = '{$price}',
                 cr_coin = '{$cr_coin}',
                 cr_state = 0,
                 cr_account = '$cr_account',
                 cr_paymethod = '현금',
                 cr_ip = '{$_SERVER['REMOTE_ADDR']}',
                 cr_date = '".G5_TIME_YMDHIS."',
                 cr_uptime = '".G5_TIME_YMDHIS."' ";
    sql_query($sql);
    $cr_id = sql_insert_id();
    
    $json_data = ['success' => true, 'code' => "200", 'message' => '코인구매가 신청되었습니다.', 'error' => null, 'data' => ""];

    // accesslog
    $log_msg = '코인구매요청';
    insert_accesslog_api($log_msg, $accesslog_gubun['2'], $mb);

    die(json_encode($json_data));
}

exit;
?>
