<?php
$sub_menu = "100600";
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '지갑 및 토큰설정';
include_once ('./admin.head.php');
?>

<h2 class="h2_frm">지갑 및 토큰설정</h2>

<div class="tbl_frm01 tbl_wrap">
    <table>
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
            <td><?php echo $config['cf_2'];?></td>
        </tr>
        </tbody>
    </table>
</div>


<?php
include_once ('./admin.tail.php');