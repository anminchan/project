<?php
$sub_menu = '100600';
include_once('./_common.php');

check_demo();

//auth_check_menu($auth, $sub_menu, "w");

if ($member['mb_level'] < 9)
    alert('관리자만 등록 가능합니다.');

check_admin_token();

if (!$_POST['cf_4'])
    alert('정보확인을 해주시기 바랍니다.');

$sql = " update {$g5['config_table']}
            set cf_4 = '{$_POST['cf_4']}' ";
sql_query($sql);

goto_url('./coin_config.php');