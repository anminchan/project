<?php
include_once('./_common.php');

// 리퍼러 체크
referer_check();

$mb_id = isset($_SESSION['ss_mb_id']) ? trim($_SESSION['ss_mb_id']) : '';

if(!$mb_id)
    alert('회원아이디 값이 없습니다. 올바른 방법으로 이용해 주십시오.');

$cr_price           = isset($_POST['cr_price'])            ? preg_replace("/[^0-9]*/s", "", trim($_POST['cr_price']))          : "";
$cr_coin            = isset($_POST['cr_coin'])             ? preg_replace("/[^0-9]*/s", "", trim($_POST['cr_coin']))           : "";
$ac_name            = isset($_POST['ac_name'])             ? trim($_POST['ac_name'])           : "";
$account            = isset($_POST['account'])             ? trim($_POST['account'])           : "";
$ac_holder          = isset($_POST['ac_holder'])           ? trim($_POST['ac_holder'])         : "";
$cr_account = $ac_name.'/'.$account.'/'.$ac_holder;

if (!$cr_price)
    alert('구매금액이 넘어오지 않았습니다.');

if(!$cr_coin)
    alert('구매코인이 넘어오지 않습니다.');

if($cr_coin!=($cr_price/10000))
    alert('구매코인이 잘못되었습니다.');

$sql = " select count(*)as cnt, TIMESTAMPDIFF(MINUTE, max(cr_date), now()) AS TIMESTAMPDIFF from {$g5['coin_req_table']} 
 where mb_id = '$mb_id' and cr_state = 0 and DATE_FORMAT(cr_date, '%y-%m-%d') = DATE_FORMAT(now(), '%y-%m-%d') ";
echo $sql;
$result = sql_fetch($sql);

if($result['TIMESTAMPDIFF']!='' && $result['TIMESTAMPDIFF']<=2)
    alert('입금신청은 2분에 1번씩만 가능합니다.\\n2분 후 재신청해주시기 바랍니다.');
    //alert('입금신청은 2분에 1번씩만 가능합니다.\\n2분 후 재신청해주시기 바랍니다.', G5_HTTP_BBS_URL.'/coin_request_form.php?cr_price='.$cr_price.'&cr_coin='.$cr_coin);

if($result['cnt'])
    alert('입금확인중에 있는 주문이 있습니다.\\n완료 후 재 신청가능합니다.');
    //alert('입금확인중에 있는 주문이 있습니다.\\n완료 후 재 신청가능합니다.', G5_HTTP_BBS_URL.'/coin_request_form.php?cr_price='.$cr_price.'&cr_coin='.$cr_coin);

//===============================================================
$sql = " insert into {$g5['coin_req_table']}
            set mb_id = '{$mb_id}',                 
                 cr_price = '{$cr_price}',
                 cr_coin = '{$cr_coin}',
                 cr_state = 0,
                 cr_account = '{$cr_account}',
                 cr_ip = '{$_SERVER['REMOTE_ADDR']}',
                 cr_date = '".G5_TIME_YMDHIS."',
                 cr_uptime = '".G5_TIME_YMDHIS."' ";
sql_query($sql);

goto_url(G5_HTTP_BBS_URL.'/coin_request.php');