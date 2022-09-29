<?php
include_once('./_common.php');
//include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
//include_once(G5_LIB_PATH.'/register.lib.php');

/*if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_BBS_URL."/coin_request_form.php"));*/

if (!$is_member)
    alert('회원 전용 서비스 입니다.', G5_BBS_URL."/login.php?url=".urlencode(G5_BBS_URL."/coin_request_form.php"));

// 불법접근을 막도록 토큰생성
$token = md5(uniqid(rand(), true));
set_session("ss_token", $token);
set_session("ss_cert_no",   "");
set_session("ss_cert_hash", "");
set_session("ss_cert_type", "");

// 리퍼러 체크
referer_check();

$g5['title'] = '코인구매';

// 계좌정보
$sql_acc = " select count(*)as cnt, ac_name, account, ac_holder, ac_memo, use_yn from {$g5['account_table']} where ac_state = 1 order by ac_id desc limit 1 ";
$result_acc = sql_fetch($sql_acc);
if ($result_acc['cnt'] <= 0)
    alert('입금계좌정보가 존재하지 않습니다.', G5_URL);

if ($result_acc['cnt'] > 0 && !$result_acc['use_yn'])
    alert('입금계좌정보가 일시 중단되었습니다.\\n잠시만 기다려 주시기바랍니다.', G5_URL);

$sql = " select if(ifnull(cf_5, 0)='', 0, ifnull(cf_5, 0))as cf_5, if(ifnull(cf_6, 0)='', 0, ifnull(cf_6, 0))as cf_6 from {$g5['config_table']} ";
$sale_limit = sql_fetch($sql);

$register_action_url = G5_BBS_URL.'/coin_request_form_update.php';

// accesslog
insert_accesslog('계좌확인요청', $accesslog_gubun['1']);

include_once('./_head.php');

include_once($coin_skin_path.'/coin_rquest_form.skin.php');

include_once('./_tail.php');