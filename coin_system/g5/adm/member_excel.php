<?php
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");


$sql_common = " from {$g5['member_table']} ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_point' :
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'mb_level' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        case 'mb_tel' :
        case 'mb_hp' :
            $sql_search .= " ({$sfl} like '%{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if ($coin_yn)
    $sql_search .= ($coin_yn=='Y'?' and mb_coin > 0 ':' and mb_coin <= 0 ');

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select * {$sql_common} {$sql_search} {$sql_order} ";
$result = sql_query($sql);
$cnt = @sql_num_rows($result);
if(!$cnt)
	alert("출력할 자료가 없습니다.");

/** Include PHPExcel */
include_once (G5_LIB_PATH.'/xlsxwriter.class.php');

$filename = '회원-'.date("ymd", time()).'.xlsx';
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

// table head
$header = array(
    '아이디'=>'string',
    '이름'=>'string',
    '보유코인'=>'price',
    '등록계좌'=>'string',
    '가입일자'=>'string',
);

$data = array();
for(++$i; $row=sql_fetch_array($result); $i++)
{
    array_push($data, array($row['mb_id'],
        $row['mb_name'],
        $row['mb_coin'],
        ($row['mb_bank_account']?$row['mb_bank_nm'].''.$row['mb_bank_account'].'/'.$row['mb_bank_holder']:''),
        $row['mb_datetime']));
}

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $exc_row)
    $writer->writeSheetRow('Sheet1', $exc_row);

$writer->writeToStdOut();
exit(0);
?>
