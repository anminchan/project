<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$coin_skin_url.'/list_style.css">', 0);
?>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:100%">

    <form name="fboardlist" id="fboardlist" method="post">

        <input type="hidden" name="page" value="<?php echo $page ?>">
        <input type="hidden" name="sw" value="">

        <!-- 게시판 페이지 정보 및 버튼 시작 { -->
        <div id="bo_btn_top">
            <div id="bo_list_total">
                <span>Total <?php echo number_format($total_count) ?>건</span>
                <?php echo $page ?> 페이지
            </div>

            <ul class="btn_bo_user">
                <?php if ($is_member) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">신청</span></a></li><?php } ?>
            </ul>
        </div>
        <!-- } 게시판 페이지 정보 및 버튼 끝 -->

        <div class="tbl_head01 tbl_wrap">
            <table>
                <caption><?php echo $board['bo_subject'] ?> 목록</caption>
                <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">구매금액</th>
                    <th scope="col">지급코인</th>
                    <th scope="col">구분</th>
                    <th scope="col">상태</th>
                    <th scope="col"><?php echo subject_sort_link('cr_date', $qstr2, 1) ?>날짜  </a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i=0; $i<count($list); $i++) {
                    if ($i%2==0) $lt_class = "even";
                    else $lt_class = "";

                    switch($list[$i]['cr_state']) {
                        case 1:
                            $str = '<span class="status_02">'.$gw_status[$list[$i]['cr_state']].'</span>';
                            $sales = $gw_status2[$list[$i]['cr_state']];
                            break;
                        case 2:
                            $str = '<span class="status_06">'.$gw_status[$list[$i]['cr_state']].'</span>';
                            $sales = $gw_status2[$list[$i]['cr_state']];
                            break;
                        case 3:
                            //$str = '<span class="status_03">증감</span>';
                            $sales = $gw_status2[$list[$i]['cr_state']];
                            break;
                        case 4:
                            //$str = '<span class="status_04">차감</span>';
                            $sales = $gw_status2[$list[$i]['cr_state']];
                            break;
                        case 5:
                            //$str = '<span class="status_05">전환</span>';
                            $sales = $gw_status2[$list[$i]['cr_state']];
                            break;
                        default :
                            $str = '<span class="status_01">'.$gw_status[$list[$i]['cr_state']].'</span>';
                            $sales = '';
                            break;
                    }
                ?>
                    <tr class="<?php echo $lt_class ?>">
                        <td class="td_num2">
                            <?php echo $num--; ?>
                        </td>
                        <td class="td_mng"><?php echo number_format($list[$i]['cr_price']); ?> KRW</td>
                        <td class="td_mng"><?php echo $list[$i]['cr_coin']; ?> COIN</td>
                        <td class="td_mng"><b><?php echo $sales; ?></b></td>
                        <td class="td_mng"><?php echo $str; ?></td>
                        <td class="td_datetime"><?php echo $list[$i]['cr_date']; ?></td>

                    </tr>
                <?php } ?>
                <?php if (count($list) == 0) { echo '<tr><td colspan="5" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
                </tbody>
            </table>
        </div>

        <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>

        <?php if ($is_member) { ?>
            <div class="bo_fx">
                    <ul class="btn_bo_user">
                        <li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">신청</span></a></li>
                    </ul>
            </div>
        <?php } ?>
    </form>
</div>
<!-- } 게시판 목록 끝 -->
