<?php
$sub_menu = '300950';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, "w");

check_admin_token();


$sql = " insert {$g5['poll_table']}
                    ( po_subject, po_poll1, po_poll2, po_poll3, po_poll4, po_poll5, po_poll6, po_poll7, po_poll8, po_poll9, po_cnt1, po_cnt2, po_cnt3, po_cnt4, po_cnt5, po_cnt6, po_cnt7, po_cnt8, po_cnt9, po_etc, po_level, po_point, po_date )
             values ( '{$_POST['po_subject']}', '{$_POST['po_poll1']}', '{$_POST['po_poll2']}', '{$_POST['po_poll3']}', '{$_POST['po_poll4']}', '{$_POST['po_poll5']}', '{$_POST['po_poll6']}', '{$_POST['po_poll7']}', '{$_POST['po_poll8']}', '{$_POST['po_poll9']}', '{$_POST['po_cnt1']}', '{$_POST['po_cnt2']}', '{$_POST['po_cnt3']}', '{$_POST['po_cnt4']}', '{$_POST['po_cnt5']}', '{$_POST['po_cnt6']}', '{$_POST['po_cnt7']}', '{$_POST['po_cnt8']}', '{$_POST['po_cnt9']}', '{$_POST['po_etc']}', '{$_POST['po_level']}', '{$_POST['po_point']}', '".G5_TIME_YMD."' ) ";
sql_query($sql);

goto_url('./poll_form.php?w=u&po_id='.$po_id.'&amp;'.$qstr);