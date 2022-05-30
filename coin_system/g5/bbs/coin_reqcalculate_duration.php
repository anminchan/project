<?php
include_once('./_common.php');

if (!$is_member)
    alert('회원 전용 서비스 입니다.', G5_BBS_URL."/login.php?url=".urlencode(G5_BBS_URL."/coin_reqcalculate_duration.php"));

$g5['title'] = '매출현황';
include_once('./_head.php');

$list = array();

$fr_date = (isset($_GET['fr_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['to_date'])) ? $_GET['to_date'] : '';

if(!$fr_date) $fr_date = date("Y-m")."-01";
if(!$to_date) $to_date = date("Y-m-d");

if ($fr_date && $to_date) {
    $where[] = " cc_date between '$fr_date' and '$to_date' ";
}

$seller_list = array();
if($member['mb_1'] == 'seller_manager' && $member['mb_2']){
    $seller_list = explode(",", $member['mb_2']);
    $where[] = " seller_id in ('".join("', '", $seller_list)."') ";
}

if ($where) {
    $sql_search = ' where '.implode(' and ', $where);
}

$sql_common = " from {$g5['coin_seller_mng_sum']} ";
$sql_order = " order by seller_id asc, cc_date desc ";

$sql = " select count(*) as cnt {$sql_common}{$sql_search} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = G5_IS_MOBILE ? $config['cf_mobile_page_rows'] : $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select cc_date,
            seller_id,
            sum(cc_sum_price1)as sum_price1,
            sum(cc_sum1)as sum_coin1,
            sum(cc_sum5)as sum_coin2,
            sum(cc_sum3)as sum_coin3,
            sum(cc_sum4)as sum_coin4
            {$sql_common}
            {$sql_search}
            group by cc_date, seller_id 
            {$sql_order}
            limit {$from_record}, {$rows} ";
//echo $sql;
$result = sql_query($sql);

for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list[] = $row;
}

$sql  = " select sum(cc_sum_price1)as sum_price1,
            sum(cc_sum1)as sum_coin1, 
            sum(cc_sum5)as sum_coin2,
            sum(cc_sum3)as sum_coin3,
            sum(cc_sum4)as sum_coin4
            $sql_common $sql_search ";
$sum_rst = sql_fetch($sql);

$write_pages = get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "?fr_date=$fr_date&to_date=$to_date&amp;page=");

include_once($coin_skin_path.'/coin_reqcalculate_duration.skin.php');

include_once('./_tail.php');
