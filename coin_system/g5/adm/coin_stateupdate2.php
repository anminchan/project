<?php
$sub_menu = '300980';
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

if ($cr_state=='5'){ // 전환승인
    $result = sql_fetch(" select * from {$g5['coin_req_table']} where cr_id = '{$cr_id}' and cr_state = '6' ");

    if($result['mb_id']){
        $sql = " update {$g5['coin_req_table']} set cr_state = 5, cr_uptime = '".G5_TIME_YMDHIS."' where cr_id = '{$cr_id}' and cr_state = '6' ";

        // 회원정보에 코인차감
        $rtn = delete_coin($result['mb_id'], $result['cr_coin']);
    }else{
        alert("변경 할 정보를 확인 바랍니다.");
    }
}else{
    $sql = " update {$g5['coin_req_table']} set cr_state = 7, cr_uptime = '".G5_TIME_YMDHIS."' where cr_id = '{$cr_id}' and cr_state = '6' ";
}

sql_query($sql);

goto_url("./coin_changelist.php?sca=$sca&amp;sst=$sst&amp;sod=$sod&amp;sfl=$sfl&amp;stx=$stx&amp;page=$page");