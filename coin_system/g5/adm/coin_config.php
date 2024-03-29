<?php
$sub_menu = "100600";
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '지갑/토큰 및 API';
include_once ('./admin.head.php');
?>
<style>
    .inner_list {white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 556px;width: 90%;}
</style>
<h2 class="h2_frm">지갑 및 토큰설정</h2>
<form name="fcoinconfig" method="post" id="fcoinconfig" action="./coin_config_update.php" autocomplete="off">
<input type="hidden" name="token" value="">
    <div class="tbl_frm01 tbl_wrap">
        <table style="table-layout:fixed">
            <caption>지갑 및 토큰설정</caption>
            <colgroup>
                <col class="grid_4">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <th scope="row"><label for="cf_title">지갑정보</label></th>
                <td><?php echo $config['cf_1'];?></td>
            </tr>
            <tr>
                <th scope="row"><label for="cf_title">Refresh Token</label></th>
                <td>
                    <textarea style="height: 80px"><?php echo $config['cf_2'];?></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="cf_title">api연동아이피<br/>(아이피는 쉼표로 구분)</label></th>
                <td>
                    <input type="text" name="cf_4" value="<?php echo $config['cf_4'];?>" class="frm_input" style="width: 100%">
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="등록" class="btn_submit btn">
    </div>
</form>

<h2 class="h2_frm">API</h2>
<div class="local_desc02 local_desc">
    <p>
        API 문서정보를 확인 해주시기 바랍니다. 위 토큰 정보는 필수이며, 변경되지 않습니다<br>
    </p>
    <a href="<?php echo G5_URL ?>/document/api_doc_v2.pdf" download="api_doc_v2" class="btn btn_01">API DOCUMENTATION DOWNLOAD</a>
</div>

<?php
include_once ('./admin.tail.php');