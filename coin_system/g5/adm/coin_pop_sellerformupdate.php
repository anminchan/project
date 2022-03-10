<?php
$sub_menu = '300900';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

$_POST = array_map('trim', $_POST);

$mb_id = $_POST['mb_id'];
$ac_id = $_POST['ac_id'];
$mb_coin = isset($_POST['mb_coin'])             ? preg_replace("/[^0-9]*/s", "", trim($_POST['mb_coin']))           : "";

if(!$mb_coin)
    alert_close('충전코인이 넘어오지 않습니다.');

// 회원정보에 코인업데이트
$rtn = insert_coin($mb_id, $mb_coin);

if(!$rtn)
    alert_close('관리자에게 문의바랍니다.');

/*echo '<script type="text/javascript">';
echo 'opener.location.reload();';
echo '</script>';

alert_close('판매자지갑주소로 전송 되었습니다.');*/
alert('판매자지갑주소로 전송 되었습니다.', './coin_pop_sellerform.php?ac_id='.$ac_id);