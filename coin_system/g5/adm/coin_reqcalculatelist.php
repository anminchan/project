<?php
$sub_menu = '300930';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$g5['title'] = '정산';
include_once (G5_ADMIN_PATH.'/admin.head.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$cr_state = isset($_GET['cr_state']) ? get_search_string($_GET['cr_state']) : '';
$cr_status = isset($_GET['cr_status']) ? get_search_string($_GET['cr_status']) : 'S';

$where = array();

$fr_date = (isset($_GET['fr_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
//$to_date = (isset($_GET['to_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['to_date'])) ? $_GET['to_date'] : '';

// 기본날짜 조건 당일로 지정
if(!isset($_GET['fr_date']) && !$fr_date)
    $fr_date = date('Y-m-d', (G5_SERVER_TIME-86400));

// 기본날짜 조건 당일로 지정
/*if(!isset($_GET['to_date']) && !$to_date)
    $to_date = G5_TIME_YMD;*/

$sql_search = "";

if ($cr_status == 'S'){
    $where[] = " cc_sum1 > 0 ";
}elseif($cr_status == 'U'){
    $where[] = " cc_sum3 > 0 ";
}elseif($cr_status == 'D'){
    $where[] = " cc_sum4 > 0 ";
}elseif($cr_status == 'C'){
    $where[] = " cc_sum5 > 0 ";
}elseif($cr_status == 'N'){
    $where[] = " cc_sum6 > 0 ";
}

/*if ($fr_date && $to_date) {
    $where[] = " cr_uptime between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
}*/
if ($fr_date) {
    $where[] = " cc_date = '$fr_date' ";
}

if ($where) {
    $sql_search = ' where '.implode(' and ', $where);
}

if ($sfl == "")  $sfl = "mb_id";

$sql_common = "  from {$g5['coin_sum_table']} ";
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

$sql  = " select *
          $sql_common
          order by mb_id
          limit $from_record, $rows ";
echo $sql;
$result = sql_query($sql);

$sql  = " select sum(cc_sum_price1)as sum_price1,
            sum(cc_sum1)as sum_coin1, 
            sum(cc_sum3)as sum_coin3, 
            sum(cc_sum4)as sum_coin4,
            sum(cc_sum5)as sum_coin5,
            sum(cc_sum6)as sum_coin6
          from {$g5['coin_sum_table']}
          where cc_date = '$fr_date' ";
echo $sql;
$sum_rst = sql_fetch($sql);

//$qstr = 'page='.$page.'&amp;sst='.$sst.'&amp;sod='.$sod.'&amp;stx='.$stx;
$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca.'&amp;save_stx='.$stx.'&amp;cr_status='.$cr_status.'&amp;date='.$date.'&amp;page_rows='.$page_rows;

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';
?>

<div class="admin_pg_notice od_test_caution">(주의!) 하루 단위로 조회가 가능합니다.</div>

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

<form class="local_sch03 local_sch">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="save_stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="page_rows" value="<?php echo $page_rows; ?>">

    <div>
        <input type="radio" name="cr_status" value="S" id="cr_status_req" <?php echo get_checked($cr_status, 'S'); ?>>
        <label for="cr_status_req">판매</label>
        <input type="radio" name="cr_status" value="U" id="cr_status_app" <?php echo get_checked($cr_status, 'U'); ?>>
        <label for="cr_status_app">증가</label>
        <input type="radio" name="cr_status" value="D" id="cr_status_hold" <?php echo get_checked($cr_status, 'D'); ?>>
        <label for="cr_status_hold">차감</label>
        <input type="radio" name="cr_status" value="C" id="cr_status_hold" <?php echo get_checked($cr_status, 'C'); ?>>
        <label for="cr_status_hold">전환</label>
        <input type="radio" name="cr_status" value="N" id="cr_status_hold" <?php echo get_checked($cr_status, 'N'); ?>>
        <label for="cr_status_hold">미전환</label>
    </div>

    <div class="sch_last">
        <strong>일자</strong>
        <input type="text" id="fr_date"  name="fr_date" value="<?php echo $fr_date; ?>" readonly class="frm_input" size="10" maxlength="10">
        <!-- ~ <input type="text" id="to_date"  name="to_date" value="<?php /*echo $to_date; */?>" readonly class="frm_input" size="10" maxlength="10">-->
        <!--<button type="button" onclick="javascript:set_date('오늘');">오늘</button>
        <button type="button" onclick="javascript:set_date('어제');">어제</button>
        <button type="button" onclick="javascript:set_date('이번주');">이번주</button>
        <button type="button" onclick="javascript:set_date('이번달');">이번달</button>
        <button type="button" onclick="javascript:set_date('지난주');">지난주</button>
        <button type="button" onclick="javascript:set_date('지난달');">지난달</button>
        <button type="button" onclick="javascript:set_date('전체');">전체</button>-->
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
                <td class="td_price"><?php echo number_format($sum_rst['sum_price1']); ?></td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin1']); ?></td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin5']); ?></td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin6']); ?></td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin3']); ?></td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin4']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</form>

<form name="fcoin_reqlist" method="post" autocomplete="off">
<input type="hidden" name="sca" value="<?php echo $sca; ?>">
<input type="hidden" name="sst" value="<?php echo $sst; ?>">
<input type="hidden" name="sod" value="<?php echo $sod; ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="q1" value="<?php echo $qstr; ?>">

<h2>정산내역</h2>
<div class="tbl_head01 tbl_wrap" id="coin_reqlist">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">아이디</th>
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

        $coin_sum = 0;
        $price_sum = 0;
        if ($cr_status == 'S'){
            $price_sum = $row['cc_sum_price1'];
            $coin_sum = $row['cc_sum1'];
        }elseif($cr_status == 'U'){
            $coin_sum = $row['cc_sum3'];
        }elseif($cr_status == 'D'){
            $coin_sum = $row['cc_sum4'];
        }elseif($cr_status == 'C'){
            $coin_sum = $row['cc_sum5'];
        }elseif($cr_status == 'N'){
            $coin_sum = $row['cc_sum6'];
        }
     ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_num"><?php echo $total_count--; ?></td>
        <td class="td_id"><?php echo $row['mb_id']; ?></td>
        <td class="td_name"><?php echo $row['mb_name']; ?></td>
        <td class="td_price"><?php echo number_format($price_sum); ?></td>
        <td class="td_price"><?php echo number_format($coin_sum); ?></td>
    </tr>
    <?php
    }
    if ($i == 0) {
        echo '<tr><td colspan="5" class="empty_table"><span>자료가 없습니다.</span></td></tr>';
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
$(function(){
    $("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" });

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