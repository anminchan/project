<?php
$sub_menu = '300900';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$sql_common = " from {$g5['seller_table']} ";

//$sql_search = " where seller_state = 1 ";
$sql_search = " where (1) ";
$sql_order = " order by index_no desc ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$g5['title'] = '업체등록';
include_once (G5_ADMIN_PATH.'/admin.head.php');
?>
    <section id="scp_list">
        <h2>업체 내역</h2>

        <form name="faccount" id="faccount" method="post" action="./seller_form_update.php" onsubmit="return faccount_submit(this);">
            <input type="hidden" name="w" value="d">
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <input type="hidden" name="token" value="">
            <div class="tbl_head01 tbl_wrap">
                <table>
                    <caption>업체 내역</caption>
                    <thead>
                    <tr>
                        <th scope="col">
                            <label for="chkall" class="sound_only">내역 전체</label>
                            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                        </th>
                        <th scope="col">업체아이디</th>
                        <th scope="col">업체명</th>
                        <th scope="col">도메인</th>
                        <th scope="col">연동형태</th>
                        <th scope="col">사용여부</th>
                        <th scope="col">메모</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=0; $row=sql_fetch_array($result); $i++) {
                        $bg = 'bg'.($i%2);
                        ?>
                        <tr class="<?php echo $bg; ?>">
                            <td class="td_chk">
                                <input type="hidden" id="ac_id_<?php echo $i; ?>" name="ac_id[<?php echo $i; ?>]" value="<?php echo $row['ac_id']; ?>">
                                <input type="checkbox" id="chk_<?php echo $i; ?>" name="chk[]" value="<?php echo $i; ?>" title="내역선택">
                            </td>
                            <td class="td_center"><?php echo $row['seller_id']; ?></td>
                            <td class="td_center"><?php echo $row['seller_name']; ?></td>
                            <td class="td_center"><?php echo $row['seller_domain']; ?></td>
                            <td class="td_center"><?php echo $row['seller_api_yn']?'사용':'미사용'; ?></td>
                            <td class="td_center"><?php echo $row['seller_state']?'사용':'미사용'; ?></td>
                            <td class="td_center"><?php echo preg_replace("/\n/", "<br />", $row['seller_memo']) ?></td>
                        </tr>
                        <?php
                    }

                    if ($i == 0)
                        echo '<tr><td colspan="7" class="empty_table">자료가 없습니다.</td></tr>';
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="btn_list01 btn_list">
                <input type="submit" name="act_button" value="업체정지" onclick="document.pressed=this.value" class="btn_frmline">
            </div>

        </form>
    </section>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

    <section id="account_postal">
        <h2 class="h2_frm">업체 등록</h2>

        <form name="faccount2" method="post" id="faccount2" action="./seller_form_update.php" autocomplete="off">
            <input type="hidden" name="token" value="">

            <div class="tbl_frm01 tbl_wrap">
                <table>
                    <caption>업체 등록</caption>
                    <colgroup>
                        <col class="grid_4">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="seller_id">업체아이디<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="seller_id" value="" id="seller_name" class="required frm_input" size="30" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="seller_name">업체명<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="seller_name" value="" id="seller_name" class="required frm_input" size="30" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="seller_domain">업체도메인<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="seller_domain" value="" id="seller_domain" class="required frm_input" size="30" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="seller_api_yn">업체API사용유무<strong class="sound_only">필수</strong></label></th>
                        <td>
                            <input type="radio" name="seller_api_yn" value="0" id="seller_api_n" checked>
                            <label for="cr_status_all">미사용</label>
                            <input type="radio" name="seller_api_yn" value="1" id="seller_api_y">
                            <label for="cr_status_req">사용</label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="seller_memo">메모</label></th>
                        <td>
                            <textarea name="seller_memo" id="seller_memo"></textarea>
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
        function faccount_submit(f)
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
include_once(G5_ADMIN_PATH.'/admin.tail.php');