<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/register.lib.php');

// 불법접근을 막도록 토큰생성
$token = md5(uniqid(rand(), true));
set_session("ss_token", $token);
set_session("ss_cert_no",   "");
set_session("ss_cert_hash", "");
set_session("ss_cert_type", "");

// 리퍼러 체크
referer_check();

if (!$is_member)
    alert('로그인 후 이용하여 주십시오.', G5_URL);

$g5['title'] = '코인구매';

// 계좌정보
$sql_acc = " select * from {$g5['account_table']} where ac_state = 1 order by ac_id desc limit 1 ";
$result_acc = sql_fetch($sql_acc);
if (!$result_acc)
    alert('입금계좌정보가 존재하지 않습니다.', G5_URL);

$register_action_url = G5_BBS_URL.'/coin_request_form_update.php';

// accesslog
insert_accesslog('계좌확인요청', $accesslog_gubun['1'], 1);

include_once('./_head.php');

include_once($coin_skin_path.'/coin_rquest_form.skin.php');

include_once('./_tail.php');