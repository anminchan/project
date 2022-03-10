<?php
$sub_menu = '400900';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, 'w');

$cr_id = $_POST['cr_id'];
$cr_state = $_POST['cr_state'];
//echo $cr_id;
//echo $cr_state;
if (!$cr_id)
    alert("변경 할 정보를 확인 바랍니다.");

//check_admin_token();

if($cr_state=='1'){
    $result = sql_fetch(" select * from {$g5['coin_req_table']} where cr_id = '{$cr_id}' ");

    // 판매자 코인 조회 후 승인가능여부
    $seller_coin = seller_coin_check($result['cr_coin']);

    if($seller_coin){
        $sql = "update {$g5['coin_req_table']} set cr_state = 1, cr_approval_date = '".G5_TIME_YMDHIS."', cr_uptime = '".G5_TIME_YMDHIS."' where cr_id = '{$cr_id}' and cr_state = 0 ";

        // 회원정보에 코인업데이트
        $rtn = insert_coin($result['mb_id'], $result['cr_coin']);

        // 판매자 코인 차감
        seller_coin_balance($seller_coin, $result['cr_coin']);
    }else{
        alert("판매자충전코인이 부족하여 승인처리 되지 않습니다.");
    }
}else{
    $sql = "update {$g5['coin_req_table']} set cr_state = 2, cr_cancel_date = '".G5_TIME_YMDHIS."', cr_uptime = '".G5_TIME_YMDHIS."' where cr_id = '{$cr_id}' and cr_state = 0 ";
}

sql_query($sql);

goto_url("./coin_reqlist.php?sca=$sca&amp;sst=$sst&amp;sod=$sod&amp;sfl=$sfl&amp;stx=$stx&amp;page=$page");