<?php
$sub_menu = '300980';
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

        $result = sql_fetch(" select * from {$g5['coin_req_table']} where cr_id = '{$icr_id}' ");

        $sql = "update {$g5['coin_req_table']} set cr_state = 5, cr_uptime = '" . G5_TIME_YMDHIS . "' where cr_id = '{$icr_id}' and cr_state = 6 ";
        sql_query($sql);

        // 회원정보에 코인차감
        $rtn = delete_coin($result['mb_id'], $result['cr_coin']);
    }
}elseif ($_POST['act_button'] == "일괄취소"){
    auth_check_menu($auth, $sub_menu, 'w');

    for ($i=0; $i<$count_post_chk; $i++) {
        // 실제 번호를 넘김
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;
        $icr_id = isset($_POST['cr_id'][$i]) ? (int) $_POST['cr_id'][$k] : 0;

        $sql = "update {$g5['coin_req_table']} set cr_state = 7, cr_uptime = '".G5_TIME_YMDHIS."'  where cr_id = '{$icr_id}' and cr_state = 6 ";
        sql_query($sql);
    }
}

if($error)
    alert($error);

goto_url("./coin_changelist.php?sca=$sca&amp;sst=$sst&amp;sod=$sod&amp;sfl=$sfl&amp;stx=$stx&amp;page=$page");