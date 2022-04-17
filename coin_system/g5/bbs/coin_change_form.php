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

$g5['title'] = '코인전환';

// 계좌정보
$sql = " select * from {$g5['member_table']} where mb_id = '{$member['mb_id']}' ";
$result = sql_fetch($sql);
if (!$result)
    alert('회원정보가 존재하지 않습니다.', G5_URL);

if ($result['mb_coin']<=0)
    alert('회원에 전환할 코인이 존재하지 않습니다.', G5_URL);

$register_action_url = G5_BBS_URL.'/coin_change_form_update.php';

// accesslog
insert_accesslog('코인전환요청', $accesslog_gubun['4'], 1);

include_once('./_head.php');

include_once($coin_skin_path.'/coin_change_form.skin.php');

include_once('./_tail.php');