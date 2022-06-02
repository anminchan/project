<?php
$sub_menu = '300902';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$sql_common = " from {$g5['member_table']} ";

$sql_search = " where mb_1 = 'seller_manager' ";
$sql_order = " order by mb_no desc ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

//$rows = $config['cf_page_rows'];
$rows = 7;
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $total_count - (($page-1)*$rows);

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$seller_sql = " select * from {$g5['seller_table']} where seller_state = 1 ";
$seller_result = sql_query($seller_sql);

$g5['title'] = '영업VIEW등록';
include_once (G5_ADMIN_PATH.'/admin.head.php');
?>
    <div class="admin_pg_notice od_test_caution">해당 VIEW관리자는 gc-company365.com에서 판매현황 확인가능합니다.</div>

    <section>
        <h2>영업VIEW ADMIN 내역</h2>
        <form name="fmanagerlist" id="fmanagerlist" method="post" action="./seller_manager_delete.php" onsubmit="return fmanagerlist_submit(this);">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <input type="hidden" name="token" value="">
            <div class="tbl_head01 tbl_wrap">
                <table>
                    <caption>VIEW ADMIN 내역</caption>
                    <thead>
                    <tr>
                        <th scope="col">
                            <label for="chkall" class="sound_only">포인트 내역 전체</label>
                            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                        </th>
                        <th scope="col">아이디</th>
                        <th scope="col">이름</th>
                        <th scope="col">관리업체</th>
                        <th scope="col">등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=0; $row=sql_fetch_array($result); $i++) {
                        $bg = 'bg'.($i%2);
                        ?>
                        <tr class="<?php echo $bg; ?>">
                            <td class="td_chk">
                                <input type="hidden" name="mb_id[<?php echo $i ?>]" value="<?php echo $row['mb_id'] ?>" id="mb_id_<?php echo $i ?>">
                                <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
                            </td>
                            <td class="td_id"><?php echo $row['mb_id']; ?></td>
                            <td class="td_name"><?php echo $row['mb_name']; ?></td>
                            <td class="td_mng"><?php echo $row['mb_2']; ?></td>
                            <td class="td_datetime"><?php echo $row['mb_datetime']; ?></td>
                        </tr>
                        <?php
                    }

                    if ($i == 0)
                        echo '<tr><td colspan="5" class="empty_table">자료가 없습니다.</td></tr>';
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="btn_list01 btn_list">
                <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn_frmline">
            </div>

        </form>
    </section>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

    <section>
        <h2 class="h2_frm">영업VIEW ADMIN 등록</h2>
        <form name="fmanager" id="fmanager" action="./seller_manager_form_update.php" method="post">
            <input type="hidden" name="token" value="">

            <div class="tbl_frm01 tbl_wrap">
                <table>
                    <caption>영업VIEW ADMIN  등록</caption>
                    <colgroup>
                        <col class="grid_4">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="view_mb_id">아이디<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="view_mb_id" value="" id="view_mb_id" class="required frm_input" size="30" required maxlength="30"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="view_mb_password">비밀번호<strong class="sound_only">필수</strong></label></th>
                        <td><input type="password" name="view_mb_password" value="" id="view_mb_password" class="required frm_input" size="30" required maxlength="30"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="view_mb_password">관리업체<strong class="sound_only">필수</strong></label></th>
                        <td>
                            <?php for($i=0; $row=sql_fetch_array($seller_result); $i++) { ?>
                                <input type="checkbox" name="seller_id[]" id="seller_id<?php echo $i;?>" value="<?php echo $row['seller_id'] ?>" class="selec_chk">
                                <label for="seller_id<?php echo $i;?>"><?php echo strtoupper($row['seller_name']); ?></label>
                            <?php } ?>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="btn_confirm01 btn_confirm">
                <input type="submit" value="등록" class="btn_submit btn">
            </div>

        </form>
    </section>

    <script>
        function fmanagerlist_submit(f)
        {
            if (!is_checked("chk[]")) {
                alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
                return false;
            }

            if(document.pressed == "선택삭제") {
                if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
                    return false;
                }
            }

            return true;
        }
    </script>

<?php
include_once('./admin.tail.php');