<?php
$sub_menu = '300970';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$sql = " select cf_5, cf_6 from {$g5['config_table']} ";
$result = sql_fetch($sql);

$g5['title'] = '구매한도설정';
include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<section id="salelimit_postal">
    <h2 class="h2_frm">구매한도 등록</h2>

    <form name="fsalelimit" method="post" id="fsalelimit" action="./salelimitupdate.php" autocomplete="off">
    <input type="hidden" name="token" value="">

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>구매한도 등록</caption>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="cf_5">1회구매한도<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="cf_5" value="<?php echo number_format($result['cf_5']); ?>" id="cf_5" class="frm_input" size="30"></td>
        </tr>
        <tr>
            <th scope="row"><label for="cf_6">1일구매한도<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="cf_6" value="<?php echo number_format($result['cf_6']); ?>" id="cf_6" class="frm_input" size="30"></td>
        </tr>
        </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="등록" class="btn_submit btn">
    </div>

    </form>

</section>

<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');