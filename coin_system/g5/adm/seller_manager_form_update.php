<?php
$sub_menu = '300950';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, "w");

check_admin_token();

$mb_id = isset($_POST['view_mb_id']) ? trim($_POST['view_mb_id']) : '';
$mb_password    = isset($_POST['view_mb_password']) ? trim($_POST['view_mb_password']) : '';
//$mb_name = isset($_POST['mb_name']) ? trim(strip_tags($_POST['mb_name'])) : '';
//$mb_nick = isset($_POST['mb_nick']) ? trim(strip_tags($_POST['mb_nick'])) : '';

$mb = get_member($mb_id);
if (isset($mb['mb_id']) && $mb['mb_id'])
    alert('이미 존재하는 회원아이디입니다.\\nＩＤ : '.$mb['mb_id'].'\\n이름 : '.$mb['mb_name'].'\\n닉네임 : '.$mb['mb_nick']);

// 매니져 아이디 생성
sql_query(" insert into {$g5['member_table']} set mb_id = '{$mb_id}', mb_password = '".get_encrypt_string($mb_password)."', mb_name = '{$mb_id}', mb_nick = '{$mb_id}', mb_level = '4', mb_open = '1', mb_datetime = '".G5_TIME_YMDHIS."', mb_ip = '{$_SERVER['REMOTE_ADDR']}', mb_1 = 'manager' ");

// 매니져권한
$result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '200100', au_auth = 'r,w' ", FALSE);
$result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300910', au_auth = 'r' ", FALSE);
$result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300920', au_auth = 'r' ", FALSE);
$result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300930', au_auth = 'r' ", FALSE);
$result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300940', au_auth = 'r' ", FALSE);
$result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300980', au_auth = 'r,d,w' ", FALSE);

//goto_url('./manageraddform.php');
alert('생성되었습니다.', './manageraddform.php');