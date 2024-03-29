<?php
$sub_menu = '300900';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$sql_common = " from {$g5['account_table']} ";

$sql_search = " where ac_state = 1 ";
$sql_order = " order by ac_id desc ";

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
$num = $total_count - (($page-1)*$rows);

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$g5['title'] = '계좌관리';
include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<section id="scp_list">
    <h2>계좌 내역</h2>

    <form name="faccount" id="faccount" method="post" action="./accountupdate.php" onsubmit="return faccount_submit(this);">
        <input type="hidden" name="page" value="<?php echo $page; ?>">
        <input type="hidden" name="token" value="">
        <div class="tbl_head01 tbl_wrap">
            <table>
            <caption>추가배송비 내역</caption>
            <thead>
            <tr>
                <th scope="col">
                    <label for="chkall" class="sound_only">내역 전체</label>
                    <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                </th>
                <th scope="col">은행명</th>
                <th scope="col">예금주</th>
                <th scope="col">계좌번호</th>
                <th scope="col">사용여부</th>
                <th scope="col">노출여부</th>
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
                <td class="td_center"><?php echo $row['ac_name']; ?></td>
                <td class="td_center"><?php echo $row['ac_holder']; ?></td>
                <td class="td_center"><?php echo $row['account']; ?></td>
                <td class="td_center"><?php echo $row['ac_state']?'사용':'미사용'; ?></td>
                <td class="td_center">
                    <input type="checkbox" name="use_yn[<?php echo $i; ?>]" value="1" <?php echo $row['use_yn']?'checked':''; ?> id="use_yn_<?php echo $i ?>">
                    <label for="use_yn_<?php echo $i; ?>" class="sound_only">노출여부</label>
                </td>
                <td class="td_center"><?php echo preg_replace("/\n/", "<br />", $row['ac_memo']) ?></td>
            </tr>
            <?php
            }

            if ($i == 0)
                echo '<tr><td colspan="6" class="empty_table">자료가 없습니다.</td></tr>';
            ?>
            </tbody>
            </table>
        </div>

        <div class="btn_fixed_top">
            <input type="submit" name="act_button" onclick="document.pressed=this.value" value="선택수정" class="btn btn_02">
            <input type="submit" name="act_button" onclick="document.pressed=this.value" value="선택삭제" class="btn btn_02">
        </div>
    </form>
</section>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<section id="account_postal">
    <h2 class="h2_frm">계좌 등록</h2>

    <form name="faccount2" method="post" id="faccount2" action="./accountupdate.php" autocomplete="off">
    <input type="hidden" name="token" value="">

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>계좌 등록</caption>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="ac_name">은행명<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="ac_name" value="" id="ac_name" class="required frm_input" size="30" required></td>
        </tr>
        <tr>
            <th scope="row"><label for="ac_holder">계좌명<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="ac_holder" value="" id="ac_holder" class="required frm_input" size="30" required></td>
        </tr>
        <tr>
            <th scope="row"><label for="account">계좌번호<strong class="sound_only">필수</strong></label></th>
            <td>
                <input type="text" name="account" id="account" required class="required frm_input" size="30"> (입력 시 숫자만 입력바랍니다.)
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="ac_memo">메모</label></th>
            <td>
                <textarea name="ac_memo" id="ac_memo"></textarea>
            </td>
        </tr>
        </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="등록" class="btn_submit btn">
        <a href="javascript:;" onclick="window.open('./coin_pop_sellerlist.php', '', 'width=650,height=450,scrollbars=1,menus=0');" class="btn_submit btn">판매자리스트</a>
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