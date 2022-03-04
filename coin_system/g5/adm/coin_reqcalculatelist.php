<?php
$sub_menu = '300930';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$g5['title'] = '신청현황';
include_once (G5_ADMIN_PATH.'/admin.head.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$cr_state = isset($_GET['cr_state']) ? get_search_string($_GET['cr_state']) : '';
$cr_status = isset($_GET['cr_status']) ? get_search_string($_GET['cr_status']) : 'S';

$where = array();

$date = (isset($_GET['date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['date'])) ? $_GET['date'] : '';

// 기본날짜 조건 당일로 지정
if(!isset($_GET['date']) && !$date)
    $date = G5_TIME_YMD;

$sql_search = "";

if ($stx != "") {
    if ($sfl != "") {
        $where[] = " $sfl like '%$stx%' ";
    }

    if ($save_stx != $stx) {
        $page = 1;
    }
}

if ($sca != "") {
    $where[] = " ca_id like '$sca%' ";
}

if ($cr_status == 'S'){
    $where[] = " cr_state = 1 ";
}elseif($cr_status == 'U'){
    $where[] = " cr_state = 3 ";
}elseif($cr_status == 'D'){
    $where[] = " cr_state = 4 ";
}elseif($cr_status == 'C'){
    $where[] = " cr_state = 5 ";
}elseif($cr_status == 'N'){
    $where[] = " cr_state = 0 ";
}

if ($date) {
    $where[] = " cr_uptime between '$date 00:00:00' and '$date 23:59:59' ";
}

if ($where) {
    $sql_search = ' where '.implode(' and ', $where);
}

if ($sfl == "")  $sfl = "mb_id";
if (!$sst) {
    $sst = "cr_id";
    $sod = "desc";
}

/*$sql_common = "  from {$g5['coin_req_table']} a
                 left join {$g5['member_table']} b on (a.mb_id = b.mb_id) ";*/
$sql_common = "  from {$g5['coin_req_table']} ";
$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

//$rows = $config['cf_page_rows'];
$rows = ($page_rows) ? $page_rows : $config['cf_page_rows'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql  = " select mb_id, mb_name, sum(cr_price)as sum_price, sum(cr_coin)as sum_coin
          $sql_common
          group by mb_id
          order by $sst $sod
          limit $from_record, $rows ";
echo $sql;
$result = sql_query($sql);

$sql  = " select sum(cr_price)as sum_price,
            sum(if(cr_state=0, cr_coin, 0))as sum_coin0, 
            sum(if(cr_state=1, cr_coin, 0))as sum_coin1, 
            -- sum(if(cr_state=2, cr_coin, 0))as sum_coin2, 
            sum(if(cr_state=3, cr_coin, 0))as sum_coin3, 
            sum(if(cr_state=4, cr_coin, 0))as sum_coin4,
            sum(if(cr_state=5, cr_coin, 0))as sum_coin5
          from {$g5['coin_req_table']}
          where cr_uptime between '$date 00:00:00' and '$date 23:59:59'";
echo $sql;
$sum_rst = sql_query($sql);

//$qstr = 'page='.$page.'&amp;sst='.$sst.'&amp;sod='.$sod.'&amp;stx='.$stx;
$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca.'&amp;save_stx='.$stx.'&amp;date='.$date;

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';
?>

<div class="admin_pg_notice od_test_caution">(주의!) 하루 단위로 조회가 가능합니다..</div>

<div class="local_ov01 local_ov">
    <?php echo $listall; ?>
    <span class="btn_ov01"><span class="ov_txt"> 전체 문의내역</span><span class="ov_num"> <?php echo $total_count; ?>건</span></span>

    <select id="page_rows" onchange="location='<?php echo "{$_SERVER['SCRIPT_NAME']}?{$qstr}&page=1";?>&page_rows='+this.value;">
        <?php echo option_selected('30',  $page_rows, '30줄 정렬'); ?>
        <?php echo option_selected('50',  $page_rows, '50줄 정렬'); ?>
        <?php echo option_selected('100', $page_rows, '100줄 정렬'); ?>
        <?php echo option_selected('150', $page_rows, '150줄 정렬'); ?>
    </select>
</div>

<form name="flist" class="local_sch01 local_sch">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="save_stx" value="<?php echo $stx; ?>">

<!--<label for="sca" class="sound_only">분류선택</label>
<select name="sca" id="sca">
    <option value="">전체분류</option>
    <?php
/*    $sql1 = " select ca_id, ca_name from {$g5['g5_shop_category_table']} order by ca_order, ca_id ";
    $result1 = sql_query($sql1);
    for ($i=0; $row1=sql_fetch_array($result1); $i++) {
        $len = strlen($row1['ca_id']) / 2 - 1;
        $nbsp = "";
        for ($i=0; $i<$len; $i++) $nbsp .= "&nbsp;&nbsp;&nbsp;";
        $selected = ($row1['ca_id'] == $sca) ? ' selected="selected"' : '';
        echo '<option value="'.$row1['ca_id'].'"'.$selected.'>'.$nbsp.$row1['ca_name'].'</option>'.PHP_EOL;
    }
    */?>
</select>-->

<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mb_id" <?php echo get_selected($sfl, 'mb_id'); ?>>아이디</option>
    <option value="mb_name" <?php echo get_selected($sfl, 'mb_name'); ?>>이름</option>
    <option value="cr_price" <?php echo get_selected($sfl, 'cr_price'); ?>>금액</option>
</select>

<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx; ?>" id="stx" required class="frm_input required">
<input type="submit" value="검색" class="btn_submit">
</form>

<form class="local_sch03 local_sch">
    <div>
        <input type="radio" name="cr_status" value="S" id="cr_status_req" <?php echo get_checked($cr_status, 'S'); ?>>
        <label for="cr_status_req">판매</label>
        <input type="radio" name="cr_status" value="U" id="cr_status_app" <?php echo get_checked($cr_status, 'U'); ?>>
        <label for="cr_status_app">증가</label>
        <input type="radio" name="cr_status" value="D" id="cr_status_hold" <?php echo get_checked($cr_status, 'D'); ?>>
        <label for="cr_status_hold">차감</label>
        <input type="radio" name="cr_status" value="C" id="cr_status_hold" <?php echo get_checked($cr_status, 'C'); ?>>
        <label for="cr_status_hold">전환</label>
        <input type="radio" name="cr_status" value="N" id="cr_status_hold" <?php echo get_checked($cr_status, 'C'); ?>>
        <label for="cr_status_hold">미전환</label>
    </div>

    <div class="sch_last">
        <input type="text" name="date" value="<?php echo $date; ?>" id="date" readonly class="frm_input" size="10" maxlength="10">
        <input type="submit" value="검색" class="btn_submit">
    </div>
    <div class="tbl_head01 tbl_wrap" id="coin_reqcalculatelist">
        <h2 class="h2_frm">정산합계</h2>
        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <thead>
            <tr>
                <th scope="col">입금금액</th>
                <th scope="col">판매코인</th>
                <th scope="col">전환코인</th>
                <th scope="col">미전환코인</th>
                <th scope="col">관리자증가</th>
                <th scope="col">관리자차감</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="td_price"><?php echo number_format($row['sum_price']); ?></td>
                <td class="td_price"><?php echo number_format($row['sum_coin0']); ?></td>
                <td class="td_price"><?php echo number_format($row['sum_coin1']); ?></td>
                <!--<td class="td_price"><?php /*echo number_format($row['sum_coin2']); */?></td>-->
                <td class="td_price"><?php echo number_format($row['sum_coin3']); ?></td>
                <td class="td_price"><?php echo number_format($row['sum_coin4']); ?></td>
                <td class="td_price"><?php echo number_format($row['sum_coin5']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</form>


<form name="fcoin_reqlist" method="post" action="./coin_reqlistupdate.php" onsubmit="return fcoin_reqlist_submit(this);" autocomplete="off">
<input type="hidden" name="sca" value="<?php echo $sca; ?>">
<input type="hidden" name="sst" value="<?php echo $sst; ?>">
<input type="hidden" name="sod" value="<?php echo $sod; ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">

<h2>정산내역</h2>
<div class="tbl_head01 tbl_wrap" id="coin_reqlist">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col"><?php echo subject_sort_link('it_name'); ?>아이디</a></th>
        <th scope="col">이름</a></th>
        <th scope="col">판매금액</a></th>
        <th scope="col">코인수량</a></th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $name = get_sideview($row['mb_id'], get_text($row['mb_name']), '', '');
        $bg = 'bg'.($i%2);
     ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_num"><?php echo $total_count--; ?></td>
        <td class="td_id"><?php echo $row['mb_id']; ?></td>
        <td class="td_name"><?php echo $row['mb_name']; ?></td>
        <td class="td_price"><?php echo number_format($row['sum_price']); ?></td>
        <td class="td_price"><?php echo number_format($row['sum_coin']); ?></td>
    </tr>
    <?php
    }
    if ($i == 0) {
        echo '<tr><td colspan="11" class="empty_table"><span>자료가 없습니다.</span></td></tr>';
    }
    ?>
    </tbody>
    </table>
</div>

<div class="btn_fixed_top">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
    <input type="submit" name="act_button" value="일괄승인" onclick="document.pressed=this.value" class="btn btn_01">
    <input type="submit" name="act_button" value="일괄취소" onclick="document.pressed=this.value" class="btn btn_03">
</div>
</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<script>
function fcoin_reqlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed  == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}

$(function(){
    $("#date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" });

    $(".qa_href").click(function(){
        var $content = $("#qa_div"+$(this).attr("target"));
        $(".qa_div").each(function(index, value){
            if ($(this).get(0) == $content.get(0)) { // 객체의 비교시 .get(0) 를 사용한다.
                $(this).is(":hidden") ? $(this).show() : $(this).hide();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');