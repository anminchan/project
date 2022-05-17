<?php
include_once('../common.php');

/*sql_query(" insert into {$g5['member_table']} set mb_id = 'nimdasys', mb_name = '최고관리자', mb_nick = '최고관리자', mb_level = 10, mb_open = 1,
mb_password = '".get_encrypt_string('qwe123!@#')."',
mb_datetime = '".G5_TIME_YMDHIS."', mb_ip = '{$_SERVER['REMOTE_ADDR']}',
 mb_email_certify = '".G5_TIME_YMDHIS."' ");

sql_query(" insert into {$g5['member_table']} set mb_id = 'nimda1', mb_name = '관리자1', mb_nick = '관리자1', mb_level = 9, mb_open = 1,
mb_password = '".get_encrypt_string('nimda1!')."',
mb_datetime = '".G5_TIME_YMDHIS."', mb_ip = '{$_SERVER['REMOTE_ADDR']}',
 mb_email_certify = '".G5_TIME_YMDHIS."', mb_wallet_addr = '".getRandStr(34)."' ");

sql_query(" insert into {$g5['member_table']} set mb_id = 'nimda2', mb_name = '관리자2', mb_nick = '관리자2', mb_level = 9, mb_open = 1,
mb_password = '".get_encrypt_string('nimda2@')."',
mb_datetime = '".G5_TIME_YMDHIS."', mb_ip = '{$_SERVER['REMOTE_ADDR']}',
 mb_email_certify = '".G5_TIME_YMDHIS."', mb_wallet_addr = '".getRandStr(34)."' ");*/

// 매니져권한
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300900', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '200810', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '200100', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '200800', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '100600', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300950', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300910', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300920', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300930', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300940', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300960', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300970', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda1', au_menu = '300980', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300900', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '200810', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '200100', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '200800', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '100600', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300950', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300910', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300920', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300930', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300940', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300960', au_auth = 'r' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300970', au_auth = 'r,w,d' ", false);
sql_query(" insert into {$g5['auth_table']} set mb_id = 'nimda2', au_menu = '300980', au_auth = 'r' ", false);



?>