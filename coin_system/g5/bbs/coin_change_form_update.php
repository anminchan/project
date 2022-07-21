<?php
include_once('./_common.php');

// 리퍼러 체크
referer_check();

$mb_id = isset($_SESSION['ss_mb_id']) ? trim($_SESSION['ss_mb_id']) : '';

if(!$mb_id)
    alert('회원아이디 값이 없습니다. 올바른 방법으로 이용해 주십시오.');

$cr_coin            = isset($_POST['cr_coin'])             ? preg_replace("/[^0-9]*/s", "", trim($_POST['cr_coin']))           : "";
$mb_name            = isset($_POST['mb_name'])             ? trim($_POST['mb_name'])           : "";
$mb_bank_nm         = isset($_POST['mb_bank_nm'])          ? trim($_POST['mb_bank_nm'])        : "";
$mb_bank_account    = isset($_POST['mb_bank_account'])     ? trim($_POST['mb_bank_account'])   : "";
$mb_bank_holder     = isset($_POST['mb_bank_holder'])      ? trim($_POST['mb_bank_holder'])    : "";
//$cr_paymethod       = isset($_POST['cr_paymethod'])      ? trim($_POST['cr_paymethod'])        : "";
$mb_account = $mb_bank_nm.'/'.$mb_bank_account.'/'.$mb_bank_holder;

if(!$cr_coin)
    alert('전환코인이 넘어오지 않습니다.');

$sql_mem = " select mb_coin from {$g5['member_table']} where mb_id = '{$mb_id}' ";
$result_mem = sql_fetch($sql_mem);
if ($result_mem['mb_coin'] < $cr_coin)
    alert('보유코인보다 많은 코인을 전환 할 수 없습니다.');

$sql = " select TIMESTAMPDIFF(MINUTE, max(cr_convert_date), now()) AS TIMESTAMPDIFF 
 from {$g5['coin_req_table']} 
 where mb_id = '$mb_id' 
 and cr_state in (5,6,7)
order by cr_convert_date desc limit 1 ";
$result = sql_fetch($sql);

if($result['TIMESTAMPDIFF']!='' && $result['TIMESTAMPDIFF']<=2)
    alert('전환신청은 2분에 1번씩만 가능합니다.\\n2분 후 재신청해주시기 바랍니다.');

$sql = " select count(*)as cnt 
 from {$g5['coin_req_table']} 
 where mb_id = '$mb_id' 
 and cr_state = 6 
 and DATE_FORMAT(cr_convert_date, '%y-%m-%d') = DATE_FORMAT(now(), '%y-%m-%d') ";
$result2 = sql_fetch($sql);

if($result2['cnt']){
    // accesslog
    insert_accesslog('전환확인중에 있는 주문이 있습니다. 완료 후 재 신청가능합니다.', $accesslog_gubun['2']);

    alert('전환확인중에 있는 신청이 있습니다.\\n완료 후 재 신청가능합니다.');
}

//===============================================================
$sql = " insert into {$g5['coin_req_table']}
            set mb_id = '{$mb_id}',    
                 mb_name = '{$mb_name}',
                 cr_coin = '{$cr_coin}',
                 cr_state = 6,
                 cr_account = '{$mb_account}',
                 cr_ip = '{$_SERVER['REMOTE_ADDR']}',
                 cr_date = '".G5_TIME_YMDHIS."',
                 cr_uptime = '".G5_TIME_YMDHIS."',
                 cr_convert_date = '" . G5_TIME_YMDHIS . "' ";
sql_query($sql);

// accesslog
$log_msg = '코인전환요청(보유코인: '.$result_mem['mb_coin'].' / 전환코인: '.$cr_coin.')';
insert_accesslog('코인전환요청', $accesslog_gubun['4']);

goto_url(G5_HTTP_BBS_URL.'/coin_request.php');