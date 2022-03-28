<?php
$sub_menu = '300970';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, "w");

check_admin_token();

    $oncelimit = isset($_POST['cf_5']) ? preg_replace('/[^0-9]/', '', $_POST['cf_5']) : '';
    $daylimit = isset($_POST['cf_6']) ? preg_replace('/[^0-9]/', '', $_POST['cf_6']) : '';

    /*if(!$oncelimit)
        alert('정확히 입력해 주십시오.');
    if(!$daylimit)
        alert('정확히 입력해 주십시오.');*/

    $sql = " update {$g5['config_table']} set cf_5 = '$oncelimit', cf_6 = '$daylimit' ";
    sql_query($sql);

goto_url('./salelimitform.php?page='.$page);