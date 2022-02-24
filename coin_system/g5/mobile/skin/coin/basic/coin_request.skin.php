<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$coin_skin_url.'/list_style.css">', 0);
?>
<form name="fboardlist" id="fboardlist" method="post">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="sw" value="">

<ul class="btn_top top btn_bo_user">
    <?php if ($is_member) { ?><li><a href="<?php echo $write_href ?>" class="fix_btn write_btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">신청</span></a></li><?php } ?>
</ul>

<!-- 게시판 목록 시작 { -->
<div id="bo_list">
    <div class="list_01">
        <ul>
            <?php for ($i=0; $i<count($list); $i++) {
                switch($list[$i]['cr_state']) {
                    case 1:
                        $str = '<span class="status_02">입금완료</span>';
                        break;
                    case 2:
                        $str = '<span class="status_06">입금취소</span>';
                        break;
                    case 3:
                        $str = '<span class="status_03">증감</span>';
                        break;
                    case 4:
                        $str = '<span class="status_04">차감</span>';
                        break;
                    case 5:
                        $str = '<span class="status_05">전환</span>';
                        break;
                    default :
                        $str = '<span class="status_01">입금요청</span>';
                        break;
                }
            ?>
                <li>
                    <div class="bo_cnt">
                        <?php echo $list[$i]['cr_price'] ?>
                        <?php echo $list[$i]['cr_coin'] ?>
                        <?php echo $list[$i]['$str'] ?>
                    </div>
                    <div class="bo_info">
                        <span class="sound_only">작성자</span><?php echo $list[$i]['mb_id'] ?>
                        <span class="bo_date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['cr_time'] ?></span>
                    </div>
                </li>
            <?php } ?>
            <?php if (count($list) == 0) { echo '<li class="empty_table">게시물이 없습니다.</li>'; } ?>
        </ul>
    </div>

</div>

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>

<div id="bo_list_total">
    <span>전체 <?php echo number_format($total_count) ?>건</span>
    <?php echo $page ?> 페이지
</div>

<!-- } 게시판 목록 끝 -->
