<?php
$sub_menu = '300900';
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

        $index_no = isset($_POST['index_no'][$i]) ? (int) $_POST['index_no'][$k] : 0;
        sql_query(" update {$g5['seller_table']} set index_no = 0 where index_no = '$index_no' ");
    }
} else {
    $seller_id = isset($_POST['seller_id']) ? trim(strip_tags(clean_xss_attributes($_POST['seller_id']))) : '';
    $seller_name = isset($_POST['seller_name']) ? trim(strip_tags(clean_xss_attributes($_POST['seller_name']))) : '';
    $seller_domain = isset($_POST['seller_domain']) ? trim(strip_tags(clean_xss_attributes($_POST['seller_domain']))) : '';
    $seller_memo = $_POST['seller_memo'];

    if(!$seller_id)
        alert('업체아이디를 입력해 주십시오.');
    if(!$seller_name)
        alert('업체명을 입력해 주십시오.');

    $sql = " insert into {$g5['seller_table']}
                  ( seller_id, seller_name, seller_domain, seller_api_yn, seller_memo )
                values
                  ( '$seller_id', '$seller_name', '$seller_domain', '{$_POST['seller_api_yn']}', '$seller_memo' ) ";
    sql_query($sql);
}

goto_url('./seller_form.php?page='.$page);