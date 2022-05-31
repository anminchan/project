<?php
include_once('./_common.php');

/*if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_BBS_URL."/coin_request.php"));*/

if (!$is_member)
    alert('회원 전용 서비스 입니다.', G5_BBS_URL."/login.php?url=".urlencode(G5_BBS_URL."/coin_request.php"));

$g5['title'] = '신청현황';
include_once('./_head.php');

$list = array();

$sql_common = " from {$g5['coin_req_table']} where mb_id = '".escape_trim($member['mb_id'])."' ";
$sql_order = " order by cr_id desc ";

$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $total_count - (($page-1)*$rows);

$sql = " select *
            {$sql_common}
            {$sql_order}
            limit {$from_record}, {$rows} ";

$result = sql_query($sql);

for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list[] = $row;
}

$write_href = short_url_clean(G5_BBS_URL.'/coin_request_form.php');

include_once($coin_skin_path.'/coin_request.skin.php');

include_once('./_tail.php');
