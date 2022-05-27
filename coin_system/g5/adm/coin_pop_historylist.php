<?php
include_once('./_common.php');

$mb_id = isset($_REQUEST['mb_id']) ? clean_xss_tags($_REQUEST['mb_id'], 1, 1) : '';

if (!$mb_id){
    alert('회원아이디가 누락되었습니다.');
}

$html_title = '회원 이력';

$g5['title'] = $html_title;
include_once(G5_PATH.'/head.sub.php');

$sql_common = " from {$g5['coin_req_table']} ";
$sql_where = " where mb_id = '$mb_id' and cr_state not in (0, 2, 6, 7) "; // 구매요청/취소, 전환요청/취소 제외

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common . $sql_where;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $total_count - (($page-1)*$rows);

$sql = " select *
            $sql_common
            $sql_where
            order by cr_id desc
            limit $from_record, $rows ";
$result = sql_query($sql);

$qstr1 = 'mb_id='.urlencode($mb_id);
?>
    <div id="sch_member_frm" class="new_win scp_new_win">
        <h1>회원 이력</h1>

        <form name="fmember" method="get">
            <div class="tbl_head01 tbl_wrap new_win_con">
                <table>
                    <caption>검색결과</caption>
                    <thead>
                    <tr>
                        <th>처리일자</th>
                        <th>처리상태</th>
                        <th>코인수량</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=0; $row=sql_fetch_array($result); $i++) {
                        ?>
                        <tr>
                            <td class="td_datetime"><?php echo $row['cr_uptime']; ?></td>
                            <td class="td_stat"><?php echo $gw_status2[$row['cr_state']]; ?></td>
                            <td class="td_num_c3"><?php echo number_format($row['cr_coin']); ?></td>
                        </tr>
                        <?php
                    }

                    if($i ==0)
                        echo '<tr><td colspan="3" class="empty_table">검색된 자료가 없습니다.</td></tr>';
                    ?>
                    </tbody>
                </table>
            </div>
        </form>

        <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr1.'&amp;page='); ?>

        <!--<div class="btn_confirm01 btn_confirm win_btn">
            <button type="button" onclick="window.close();" class="btn_close btn">닫기</button>
        </div>-->
    </div>
<?php
include_once(G5_PATH.'/tail.sub.php');