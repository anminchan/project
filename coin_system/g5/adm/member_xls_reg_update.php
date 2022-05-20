<?php
$sub_menu = "200100";
include_once("./_common.php");

auth_check_menu($auth, $sub_menu, 'w');

check_admin_token();

if($_FILES['excelfile']['tmp_name']) {

    $filename = $_FILES['excelfile']['tmp_name'];

    require_once G5_LIB_PATH."/PHPExcel.php";

    $objPHPExcel = new PHPExcel();
    require_once G5_LIB_PATH."/PHPExcel/IOFactory.php";

    $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
    $objReader->setReadDataOnly(true);
    $objExcel = $objReader->load($filename);
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet();
    $rowIterator = $sheet->getRowIterator();

    foreach($rowIterator as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
    }
    $maxRow = $sheet->getHighestRow();
    if($maxRow >= 1004) alert("엑셀자료의 최대건수를 초과했습니다.($maxRow) 1,000건씩 나누어 업로드 하시기 바랍니다.");

    $fail_id = array();
    $total_count = 0;
    $fail_count = 0;
    $succ_count = 0;
    $k = 1;

    for($i=4; $i<=$maxRow; $i++)
    {
        $total_count++;

        $mb_id			    = addslashes(trim($sheet->getCell('A'.$i)->getValue())); // 아이디
        $mb_password		= addslashes(trim($sheet->getCell('B'.$i)->getValue())); // 패스워드
        $mb_name		    = addslashes(trim($sheet->getCell('C'.$i)->getValue())); // 이름
        $mb_bank_nm		    = addslashes(trim($sheet->getCell('D'.$i)->getValue())); // 은행
        $mb_bank_account    = addslashes(trim($sheet->getCell('E'.$i)->getValue())); // 계좌번호
        $mb_bank_holder		= addslashes(trim($sheet->getCell('F'.$i)->getValue())); // 예금주
        $mb_hp			    = addslashes(trim($sheet->getCell('G'.$i)->getValue())); // 휴대폰번호
        $mb_email			= addslashes(trim($sheet->getCell('H'.$i)->getValue())); // 이메일

        if(!$mb_id || !$mb_password || !$mb_name || !$mb_bank_nm || !$mb_bank_account || !$mb_bank_holder) {
            $fail_count++;
            continue;
        }

        $mb = get_member($mb_id);
        if (isset($mb['mb_id']) && $mb['mb_id']){
            $fail_count++;
            $fail_id[] = $mb['mb_id'];
            continue;
        }

        $sql_common = " mb_id = '{$mb_id}',  
                 mb_password = '".get_encrypt_string($mb_password)."',
                 mb_name = '{$mb_name}',
                 mb_nick = '{$mb_name}',
                 mb_email = '{$mb_email}',
                 mb_hp = '{$mb_hp}',
                 mb_level = 2,
                 mb_datetime = '".G5_TIME_YMDHIS."',
                 mb_ip = '{$_SERVER['REMOTE_ADDR']}',
                 mb_email_certify = '".G5_TIME_YMDHIS."',
                 mb_bank_nm = '{$mb_bank_nm}',
                 mb_bank_account = '{$mb_bank_account}',
                 mb_bank_holder = '{$mb_bank_holder}',
                 mb_wallet_addr = '".getRandStr(34)."' ";

        sql_query(" insert into {$g5['member_table']} set {$sql_common} ");

        $succ_count++;
    }
}

//goto_url('./member_list.php');

include_once('./admin.head.php');
?>


<h2>총 건수</h2>
<div class="tbl_frm01 tbl_wrap">
    <table>
        <colgroup>
            <col class="w180">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row">총회원건수</th>
            <td><?php echo number_format($total_count); ?>건</td>
        </tr>
        <tr>
            <th scope="row">완료건수</th>
            <td><?php echo number_format($succ_count); ?>건</td>
        </tr>
        <tr>
            <th scope="row">실패건수</th>
            <td><?php echo number_format($fail_count); ?>건</td>
        </tr>
        <?php if($fail_count > 0) { ?>
            <tr>
                <th scope="row">실패아이디</th>
                <td><?php echo implode(', ', $fail_id); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <a href="<?php echo G5_ADMIN_URL; ?>/member_list.php" class="btn btn_02">확인</a>
</div>

<div class="local_desc01 local_desc">
    <p>ㆍ엑셀자료는 1회 업로드당 최대 1,000건까지 이므로 1,000건씩 나누어 업로드 하시기 바랍니다.</p>
    <p>ㆍ엑셀파일을 저장하실 때는 <strong>Excel 97 - 2003 통합문서 (*.xls)</strong> 로 저장하셔야 합니다.</p>
    <p>ㆍ엑셀데이터는 4번째 라인부터 저장되므로 타이틀은 지우시면 안됩니다.</p>
</div>

<script>
    $(function() {
        // 새로고침(F5) 막기
        $(document).keydown(function (e) {
            if(e.which === 116) {
                if(typeof event == "object") {
                    event.keyCode = 0;
                }
                return false;
            } else if(e.which === 82 && e.ctrlKey) {
                return false;
            }
        });
    });
</script>
<?php

include_once('./admin.tail.php');
