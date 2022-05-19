<?php
$sub_menu = "200100";
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, 'w');

if ($mb['mb_intercept_date']) $g5['title'] = "차단된 ";
else $g5['title'] .= "";
$g5['title'] .= '회원 일괄등록';
include_once('./admin.head.php');
?>

<form name="fitemexcel" id="fitemexcel" onsubmit="return fitemexcel_submit(this);" action="./member_xls_reg_update.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="token" value="">

<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row">샘플파일 다운</th>
        <td><a href="<?php echo G5_URL.'/'.G5_LIB_DIR; ?>/Excel/memberexcel.xls" class="btn_small bx-blue"><i class="fa fa-download"></i> 샘플파일 다운로드</a></td>
    </tr>
    <tr>
        <th scope="row">파일 업로드</th>
        <td><input type="file" name="excelfile"></td>
    </tr>

    </tbody>
    </table>
</div>

<div class="btn_fixed_top">
    <a href="./member_list.php?<?php echo $qstr ?>" class="btn btn_02">목록</a>
    <input type="submit" value="확인" class="btn_submit btn" accesskey='s'>
</div>
</form>

<script>
function fitemexcel_submit(f)
{
    if(!f.excelfile.value) {
        alert('(*.xls) 파일을 업로드해주십시오.');
        return false;
    }

    if(!f.excelfile.value.match(/\.(xls)$/i) && f.excelfile.value) {
        alert('(*.xls) 파일만 등록 가능합니다.');
        return false;
    }

    if(!confirm("회원 일괄등록을 진행하시겠습니까?"))
        return false;

    return true;
}
</script>
<?php
run_event('admin_member_form_after', $mb, $w);

include_once('./admin.tail.php');