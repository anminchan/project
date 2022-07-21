<?php
$sub_menu = '300910';
include_once('./_common.php');

check_demo();

check_admin_token();

$count_post_chk = (isset($_POST['chk']) && is_array($_POST['chk'])) ? count($_POST['chk']) : 0;

if (! $count_post_chk) {
    alert($_POST['act_button']." 하실 항목을 하나 이상 체크하세요.");
}

$error = '';

if ($_POST['act_button'] == "선택삭제") {

    auth_check_menu($auth, $sub_menu, 'd');

    for ($i=0; $i<$count_post_chk; $i++) {
        // 실제 번호를 넘김
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;
        $iiq_id = isset($_POST['iq_id'][$i]) ? (int) $_POST['iq_id'][$k] : 0;

        $sql = "delete from {$g5['g5_shop_item_qa_table']} where iq_id = '{$iiq_id}' ";
        sql_query($sql);
    }
}elseif ($_POST['act_button'] == "일괄승인"){

    auth_check_menu($auth, $sub_menu, 'w');

    for ($i=0; $i<$count_post_chk; $i++) {
        // 실제 번호를 넘김
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;
        $icr_id = isset($_POST['cr_id'][$i]) ? (int) $_POST['cr_id'][$k] : 0;

        $result = sql_fetch(" select * from {$g5['coin_req_table']} where cr_id = '{$icr_id}' and cr_state = '0' ");

        if($result['mb_id']){
            // 판매자 코인 조회 후 승인가능여부
            $seller_coin = seller_coin_check($result['cr_coin']);

            if($seller_coin) {
                $sql = "update {$g5['coin_req_table']} set cr_state = 1, cr_approval_date = '" . G5_TIME_YMDHIS . "', cr_uptime = '" . G5_TIME_YMDHIS . "' where cr_id = '{$icr_id}' and cr_state = '0' ";
                sql_query($sql);

                // 회원정보에 코인업데이트
                $rtn = insert_coin($result['mb_id'], $result['cr_coin']);

                // 판매자 코인 차감
                seller_coin_balance($seller_coin, $result['cr_coin']);
            }else{
                $error = '판매자충전코인이 부족하여 일부는 승인처리 되지 않습니다.';
                continue;
            }
        }else{
            $error = '변경 할 정보를 확인 바랍니다.';
            continue;
        }
    }
}elseif ($_POST['act_button'] == "일괄취소"){
    auth_check_menu($auth, $sub_menu, 'w');

    for ($i=0; $i<$count_post_chk; $i++) {
        // 실제 번호를 넘김
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;
        $icr_id = isset($_POST['cr_id'][$i]) ? (int) $_POST['cr_id'][$k] : 0;

        $sql = "update {$g5['coin_req_table']} set cr_state = 2, cr_cancel_date = '".G5_TIME_YMDHIS."', cr_uptime = '".G5_TIME_YMDHIS."'  where cr_id = '{$icr_id}' and cr_state = '0' ";
        sql_query($sql);
    }
}

if($error)
    alert($error);

goto_url("./coin_reqlist.php?sca=$sca&amp;sst=$sst&amp;sod=$sod&amp;sfl=$sfl&amp;stx=$stx&amp;page=$page");