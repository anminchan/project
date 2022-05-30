<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$coin_skin_url.'/style.css">', 0);

include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');
?>

<!-- 전체게시물 검색 시작 { -->
<fieldset id="new_sch">
    <legend>상세검색</legend>
    <form name="fnew" method="get">
        <div class="ipt_sch">
            <input type="text" id="fr_date"  name="fr_date" value="<?php echo $fr_date; ?>" readonly class="frm_input" size="10" maxlength="10">
            ~ <input type="text" id="to_date"  name="to_date" value="<?php echo $to_date; ?>" readonly class="frm_input" size="10" maxlength="10">
            <button type="submit" class="btn_submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>
    <p>회원 아이디만 검색 가능</p>

    <div id="fnewlist" class="new_list">
        <ul>
            <li>
                <a href="javascript:;" class="new_tit">판매금액 : <?php echo number_format($sum_rst['sum_price1']); ?></a>
            </li>
            <li>
                <a href="javascript:;" class="new_tit">판매코인 : <?php echo number_format($sum_rst['sum_coin1']); ?></a>
            </li>
        </ul>
    </div>
</fieldset>
<!-- } 전체게시물 검색 끝 -->

<!-- 전체게시물 목록 시작 { -->
<div id="fnewlist" class="new_list">
    <ul>

        <?php
        for ($i=0; $i<count($list); $i++)
        {
            ?>
            <li>
                <a href="javascript:;" class="new_board">판매코인 : <?php echo number_format($list[$i]['sum_coin1']); ?></a>
                <a href="javascript:;" class="new_tit">판매금액 : <?php echo number_format($list[$i]['sum_price1']); ?></a>
                <div class="new_info">
                    <span class="sound_only">업체</span><?php echo $list[$i]['seller_id'] ?>
                    <span class="new_date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['cc_date'] ?></span>
                </div>
            </li>
        <?php } ?>

        <?php if ($i == 0)
            echo '<li class="empty_table">게시물이 없습니다.</li>';
        ?>
    </ul>
</div>

<?php echo $write_pages ?>
<script>
    $(function(){
        $("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" });
    });
</script>
<!-- } 전체게시물 목록 끝 -->
