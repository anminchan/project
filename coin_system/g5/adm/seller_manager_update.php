<?php
$sub_menu = '300902';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, 'w');

check_admin_token();

$count = (isset($_POST['chk']) && is_array($_POST['chk'])) ? count($_POST['chk']) : 0;
if(!$count)
    alert($_POST['act_button'].' 하실 항목을 하나 이상 체크하세요.');

if ($_POST['act_button'] == "선택수정") {

    for ($i=0; $i<$count; $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];
        $str_mb_id = sql_real_escape_string($_POST['mb_id'][$k]);
        $string = implode(",",$_POST['view_seller_id'.$k]);

        // view admin권한삭제
        $sql = " update {$g5['member_table']} set mb_2 = '{$string}' where mb_id = '{$str_mb_id}' and mb_level = '6' ";
        echo $sql;
        sql_query($sql);
    }
} else if ($_POST['act_button'] == "선택삭제") {
    auth_check_menu($auth, $sub_menu, 'd');

    for ($i=0; $i<$count; $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];
        $str_mb_id = sql_real_escape_string($_POST['mb_id'][$k]);

        $mb_datas[] = $mb = get_member($str_mb_id);

        if (!$mb['mb_id']) {
            $msg .= $mb['mb_id'].' : 회원자료가 존재하지 않습니다.\\n';
        } else if ($member['mb_id'] == $mb['mb_id']) {
            $msg .= $mb['mb_id'].' : 로그인 중인 관리자는 삭제 할 수 없습니다.\\n';
        } else if (is_admin($mb['mb_id']) == 'super') {
            $msg .= $mb['mb_id'].' : 최고 관리자는 삭제할 수 없습니다.\\n';
        } else if ($is_admin != 'super' && $mb['mb_level'] >= $member['mb_level']) {
            $msg .= $mb['mb_id'].' : 자신보다 권한이 높거나 같은 회원은 삭제할 수 없습니다.\\n';
        } else {
            // view admin권한삭제
            $sql = " delete from {$g5['auth_table']} where mb_id = '{$str_mb_id}' ";
            sql_query($sql);

            // view admin삭제
            $sql = " delete from {$g5['member_table']} where mb_id = '{$str_mb_id}' ";
            sql_query($sql);
        }
    }
}

goto_url('./seller_manager_form.php');