<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$colspan = 7;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$coin_skin_url.'/style.css">', 0);

include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');
?>

<!-- 전체게시물 검색 시작 { -->
<fieldset id="new_sch">
    <legend>상세검색</legend>
    <form name="fnew" method="get">
        <input type="text" id="fr_date"  name="fr_date" value="<?php echo $fr_date; ?>" readonly class="frm_input">
        ~ <input type="text" id="to_date"  name="to_date" value="<?php echo $to_date; ?>" readonly class="frm_input">
        <button type="submit" class="btn_submit"><i class="fa fa-search" aria-hidden="true"></i> 검색</button>
    </form>

    <div class="tbl_head01 tbl_wrap">
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
</fieldset>
<!-- } 전체게시물 검색 끝 -->

<!-- 전체게시물 목록 시작 { -->
<form name="fnewlist" id="fnewlist" method="post" action="#" onsubmit="return fnew_submit(this);">
    <input type="hidden" name="sw"       value="move">
    <input type="hidden" name="view"     value="<?php echo $view; ?>">
    <input type="hidden" name="sfl"      value="<?php echo $sfl; ?>">
    <input type="hidden" name="stx"      value="<?php echo $stx; ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
    <input type="hidden" name="page"     value="<?php echo $page; ?>">
    <input type="hidden" name="pressed"  value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
            <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">업체</th>
                <th scope="col">일자</th>
                <th scope="col">판매금액</th>
                <th scope="col">팬매코인</th>
                <th scope="col">전환코인</th>
                <th scope="col">관리자증가</th>
                <th scope="col">관리자차감</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0; $i<count($list); $i++)
            {
                $num = $total_count - ($page - 1) * $config['cf_page_rows'] - $i;
                ?>
                <tr>
                    <td class="td_num"><?php echo $num--; ?></td>
                    <td class="td_name"><?php echo $list[$i]['seller_id']; ?></td>
                    <td class="td_datetime"><?php echo $list[$i]['cc_date']; ?></td>
                    <td class="td_price"><b style="color: blue;"><?php echo number_format($list[$i]['sum_price1']); ?></b></td>
                    <td class="td_coin"><?php echo number_format($list[$i]['sum_coin1']); ?></td>
                    <td class="td_coin"><?php echo number_format($list[$i]['sum_coin2']); ?></td>
                    <td class="td_coin"><?php echo number_format($list[$i]['sum_coin3']); ?></td>
                    <td class="td_coin"><?php echo number_format($list[$i]['sum_coin4']); ?></td>
                </tr>
            <?php }  ?>

            <?php if ($i == 0)
                echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>';
            ?>
            </tbody>
        </table>
    </div>

    <?php echo $write_pages ?>

</form>
<script>
    $(function(){
        $("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" });
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
<!-- } 전체게시물 목록 끝 -->