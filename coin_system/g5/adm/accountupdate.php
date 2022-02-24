<?php
$sub_menu = '400750';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, "w");

check_admin_token();

$w = isset($_POST['w']) ? $_POST['w'] : '';

if($w == 'd') {
    $count = (isset($_POST['chk']) && is_array($_POST['chk'])) ? count($_POST['chk']) : 0;
    if(!$count)
        alert('삭제하실 항목을 하나이상 선택해 주십시오.');

    for($i=0; $i<$count; $i++) {
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;

        $ac_id = isset($_POST['ac_id'][$i]) ? (int) $_POST['ac_id'][$k] : 0;
        //sql_query(" delete from {$g5['account_table']} where ac_id = '$ac_id' ");
        sql_query(" update {$g5['account_table']} set ac_state = 0 where ac_id = '$ac_id' ");
    }
} else {
    $ac_name = isset($_POST['ac_name']) ? trim(strip_tags(clean_xss_attributes($_POST['ac_name']))) : '';
    $ac_holder = isset($_POST['ac_holder']) ? trim(strip_tags(clean_xss_attributes($_POST['ac_holder']))) : '';
    $ac_memo = $_POST['ac_memo'];
    $account = isset($_POST['account']) ? preg_replace('/[^0-9]/', '', $_POST['account']) : '';

    if(!$ac_name)
        alert('계좌명을 입력해 주십시오.');
    if(!$account)
        alert('계좌번호를 입력해 주십시오.');

    $sql = " insert into {$g5['account_table']}
                  ( ac_name, account, ac_holder, ac_memo )
                values
                  ( '$ac_name', '$account', '$ac_holder', '$ac_memo' ) ";
    sql_query($sql);
}

goto_url('./accountlist.php?page='.$page);