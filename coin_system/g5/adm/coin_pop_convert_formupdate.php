<?php
$sub_menu = '300910';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

$_POST = array_map('trim', $_POST);

$mb_id = $_POST['mb_id'];
$cr_coin = $_POST['cr_coin'];
$cr_memo = $_POST['cr_memo'];
$cr_state = $_POST['cr_state'];
$mb = get_member($mb_id);
$cr_account = $mb['mb_bank_nm'] . ' / ' . $mb['mb_bank_account'] . ' / ' . $mb['mb_bank_holder'];

if ($cr_coin <= 0)
    alert_close('코인값이 잘못되었습니다.');

if ($mb['mb_coin'] < $cr_coin)
    alert_close('잔액이 부족합니다.');

$sql = " insert into {$g5['coin_req_table']}
            set mb_id = '$mb_id',
                mb_name = '{$mb['mb_name']}',
                cr_state = '$cr_state',
                cr_coin = '$cr_coin',
                cr_account = '$cr_account',
                cr_ip   = '{$_SERVER['REMOTE_ADDR']}',
                cr_memo   = '$cr_memo',
                cr_date = '" . G5_TIME_YMDHIS . "',
                cr_uptime = '" . G5_TIME_YMDHIS . "',
                cr_convert_date = '" . G5_TIME_YMDHIS . "' ";
sql_query($sql);

// 회원정보에 코인업데이트
if ($cr_state == '3')
    $rtn = insert_coin($mb_id, $cr_coin);
else
    $rtn = delete_coin($mb_id, $cr_coin);

if (!$rtn)
    alert_close('관리자에게 문의바랍니다.');

echo '<script type="text/javascript">';
echo 'opener.location.reload();';
echo '</script>';

alert_close('코인 ' . ($cr_state == '3' ? '증가' : '차감') . ' 되었습니다.');
