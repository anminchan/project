<?php
include_once('./_common.php');

// 리퍼러 체크
referer_check();

$mb_id = isset($_SESSION['ss_mb_id']) ? trim($_SESSION['ss_mb_id']) : '';

if(!$mb_id)
    alert('회원아이디 값이 없습니다. 올바른 방법으로 이용해 주십시오.');

$cr_price           = isset($_POST['cr_price'])            ? preg_replace("/[^0-9]*/s", "", trim($_POST['cr_price']))          : "";
$cr_coin            = isset($_POST['cr_coin'])             ? preg_replace("/[^0-9]*/s", "", trim($_POST['cr_coin']))           : "";
$mb_name            = isset($_POST['mb_name'])             ? trim($_POST['mb_name'])           : "";
$mb_bank_nm         = isset($_POST['mb_bank_nm'])          ? trim($_POST['mb_bank_nm'])        : "";
$mb_bank_account    = isset($_POST['mb_bank_account'])     ? trim($_POST['mb_bank_account'])   : "";
$mb_bank_holder     = isset($_POST['mb_bank_holder'])      ? trim($_POST['mb_bank_holder'])    : "";
$cr_paymethod       = isset($_POST['cr_paymethod'])      ? trim($_POST['cr_paymethod'])        : "";
$mb_account = $mb_bank_nm.'/'.$mb_bank_account.'/'.$mb_bank_holder;

if (!$cr_price)
    alert('구매금액이 넘어오지 않았습니다.');

if(!$cr_coin)
    alert('구매코인이 넘어오지 않습니다.');

if($cr_coin!=($cr_price/10000))
    alert('구매코인이 잘못되었습니다.');

$sql = " select TIMESTAMPDIFF(MINUTE, max(cr_date), now()) AS TIMESTAMPDIFF 
 from {$g5['coin_req_table']} 
 where mb_id = '$mb_id' 
 and cr_state in (0,1,2)
order by cr_id desc limit 1 ";
$result = sql_fetch($sql);

/*if($result['TIMESTAMPDIFF']!='' && $result['TIMESTAMPDIFF']<=2)
    alert('입금신청은 2분에 1번씩만 가능합니다.\\n2분 후 재신청해주시기 바랍니다.');*/
    //alert('입금신청은 2분에 1번씩만 가능합니다.\\n2분 후 재신청해주시기 바랍니다.', G5_HTTP_BBS_URL.'/coin_request_form.php?cr_price='.$cr_price.'&cr_coin='.$cr_coin);

$sql = " select count(*)as cnt 
 from {$g5['coin_req_table']} 
 where mb_id = '$mb_id' 
 and cr_state = 0 
 and DATE_FORMAT(cr_date, '%y-%m-%d') = DATE_FORMAT(now(), '%y-%m-%d') ";
$result2 = sql_fetch($sql);

if($result2['cnt']){
    // accesslog
    insert_accesslog('입금확인중에 있는 주문이 있습니다. 완료 후 재 신청가능합니다.', $accesslog_gubun['2']);

    alert('입금확인중에 있는 주문이 있습니다.\\n완료 후 재 신청가능합니다.');
    //alert('입금확인중에 있는 주문이 있습니다.\\n완료 후 재 신청가능합니다.', G5_HTTP_BBS_URL.'/coin_request_form.php?cr_price='.$cr_price.'&cr_coin='.$cr_coin);
}

//===============================================================
$sql = " insert into {$g5['coin_req_table']}
            set mb_id = '{$mb_id}',    
                 mb_name = '{$mb_name}',             
                 cr_price = '{$cr_price}',
                 cr_coin = '{$cr_coin}',
                 cr_state = 0,
                 cr_account = '{$mb_account}',
                 cr_paymethod = '{$cr_paymethod}',
                 cr_ip = '{$_SERVER['REMOTE_ADDR']}',
                 cr_date = '".G5_TIME_YMDHIS."',
                 cr_uptime = '".G5_TIME_YMDHIS."' ";
sql_query($sql);

// accesslog
insert_accesslog('코인구매요청', $accesslog_gubun['2']);

goto_url(G5_HTTP_BBS_URL.'/coin_request.php');