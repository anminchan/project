<?php
$sub_menu = '300904';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$g5['title'] = '업체별매출현황';
include_once (G5_ADMIN_PATH.'/admin.head.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$where = array();

$fr_date = (isset($_GET['fr_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['to_date'])) ? $_GET['to_date'] : '';

//if(!$fr_date) $fr_date = date("Y-m")."-01";
if(!$fr_date) $fr_date = date('Y-m-d', (G5_SERVER_TIME-86400));
//if(!$to_date) $to_date = date("Y-m-d");
if(!$to_date) $to_date = date('Y-m-d', (G5_SERVER_TIME-86400));

if(!$duration) $duration = "D";

$sql_search = "";

if ($fr_date && $to_date) {
    $where[] = " cc_date between '$fr_date' and '$to_date' ";
}

//$where[] = " seller_id in(select seller_id from {$g5['seller_table']} where seller_state = 1) ";
$where[] = " seller_id in(select seller_id from {$g5['seller_table']} where 1=1) ";

if ($where) {
    $sql_search = ' where '.implode(' and ', $where);
}

$sql_common = " from {$g5['coin_seller_mng_sum']} ";
$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt from(select * " . $sql_common . " group by seller_id) a ";
//echo $sql;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

//$rows = $config['cf_page_rows'];
$rows = ($page_rows) ? $page_rows : $config['cf_page_rows'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $total_count - (($page-1)*$rows);

$sql  = " select seller_id,
        sum(cc_sum_price1)as sum_price1,
        sum(cc_sum1)as sum_coin1,
        sum(cc_sum5)as sum_coin2,
        sum(cc_sum3)as sum_coin3,
        sum(cc_sum4)as sum_coin4
        $sql_common
        group by seller_id ";
//echo $sql;
$result = sql_query($sql);

$sql  = " select sum(cc_sum_price1)as sum_price1,
            sum(cc_sum1)as sum_coin1, 
            sum(cc_sum5)as sum_coin2,
            sum(cc_sum3)as sum_coin3,
            sum(cc_sum4)as sum_coin4
          $sql_common ";
//echo $sql;
$sum_rst = sql_fetch($sql);

//$qstr = 'page='.$page.'&amp;sst='.$sst.'&amp;sod='.$sod.'&amp;stx='.$stx;
$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca.'&amp;save_stx='.$stx.'&amp;duration='.$duration.'&amp;fr_date='.$fr_date.'&amp;to_date='.$to_date.'&amp;page_rows='.$page_rows;

?>
<div class="admin_pg_notice od_test_caution">전일 내역부터 조회 가능합니다.(업체별 내역 일괄 저장)</div>

<div class="local_ov01 local_ov">
    <span class="btn_ov01"><span class="ov_txt"> 전체 문의내역</span><span class="ov_num"> <?php echo $total_count; ?>건</span></span>
</div>

<form class="local_sch03 local_sch">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="save_stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="page_rows" value="<?php echo $page_rows; ?>">

    <div class="sch_last">
        <strong>일자</strong>
        <input type="text" id="fr_date"  name="fr_date" value="<?php echo $fr_date; ?>" readonly class="frm_input" size="10" maxlength="10">
        ~ <input type="text" id="to_date"  name="to_date" value="<?php echo $to_date; ?>" readonly class="frm_input" size="10" maxlength="10">
        <!--<button type="button" onclick="javascript:set_date('오늘');">오늘</button>-->
        <button type="button" onclick="javascript:set_date('어제');">어제</button>
        <button type="button" onclick="javascript:set_date('이번주');">이번주</button>
        <button type="button" onclick="javascript:set_date('이번달');">이번달</button>
        <button type="button" onclick="javascript:set_date('지난주');">지난주</button>
        <button type="button" onclick="javascript:set_date('지난달');">지난달</button>
        <!--<button type="button" onclick="javascript:set_date('전체');">전체</button>-->
        <input type="submit" value="검색" class="btn_submit">
    </div>

    <div class="tbl_head01 tbl_wrap" id="coin_reqcalculatelist">
        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">판매금액</th>
                <th scope="col">판매코인</th>
                <!--<th scope="col">전환금액</th>-->
                <th scope="col">전환코인</th>
                <th scope="col">관리자증가</th>
                <th scope="col">관리자차감</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="td_price">합계</td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_price1']); ?></td>
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin1']); ?></td>
                <!--<td class="td_price"><?php /*echo number_format($sum_rst['sum_price2']); */?></td>-->
                <td class="td_price"><?php echo number_format($sum_rst['sum_coin2']); ?></td>
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
        <th scope="col">업체</th>
        <th scope="col">입금금액</th>
        <th scope="col">판매코인</th>
        <th scope="col">전환코인</th>
        <th scope="col">관리자증가</th>
        <th scope="col">관리자차감</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $name = get_sideview($row['mb_id'], get_text($row['mb_name']), '', '');
        $bg = 'bg'.($i%2);

     ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_num"><?php echo $num--; ?></td>
        <td class="td_name"><?php echo $row['seller_id']; ?></td>
        <td class="td_price"><b style="color: blue;"><?php echo number_format($row['sum_price1']); ?></b></td>
        <td class="td_price"><?php echo number_format($row['sum_coin1']); ?></td>
        <td class="td_price"><?php echo number_format($row['sum_coin2']); ?></td>
        <td class="td_price"><?php echo number_format($row['sum_coin3']); ?></td>
        <td class="td_price"><?php echo number_format($row['sum_coin4']); ?></td>
    </tr>
    <?php
    }
    if ($i == 0) {
        echo '<tr><td colspan="7" class="empty_table"><span>자료가 없습니다.</span></td></tr>';
    }
    ?>
    </tbody>
    </table>
</div>

</form>

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


function set_date(today)
{
    <?php
    $date_term = date('w', G5_SERVER_TIME);
    $week_term = $date_term + 7;
    $last_term = strtotime(date('Y-m-01', G5_SERVER_TIME));
    ?>
    if (today == "오늘") {
        document.getElementById("fr_date").value = "<?php echo G5_TIME_YMD; ?>";
        document.getElementById("to_date").value = "<?php echo G5_TIME_YMD; ?>";
    } else if (today == "어제") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
    } else if (today == "이번주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$date_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "이번달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', G5_SERVER_TIME); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "지난주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$week_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', strtotime('-'.($week_term - 6).' days', G5_SERVER_TIME)); ?>";
    } else if (today == "지난달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', strtotime('-1 Month', $last_term)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-t', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "전체") {
        document.getElementById("fr_date").value = "";
        document.getElementById("to_date").value = "";
    }
}

</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');