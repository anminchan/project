<?php
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$cr_state = isset($_GET['cr_state']) ? get_search_string($_GET['cr_state']) : '';

$where = array();

$fr_date = (isset($_GET['fr_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['to_date'])) ? $_GET['to_date'] : '';

// 기본날짜 조건 당일로 지정
if(!isset($_GET['fr_date']) && !$fr_date)
    $fr_date = G5_TIME_YMD;

// 기본날짜 조건 당일로 지정
if(!isset($_GET['to_date']) && !$to_date)
    $to_date = G5_TIME_YMD;

$sql_search = "";

if ($stx != "") {
    if ($sfl != "") {
        $where[] = " $sfl like '%$stx%' ";
    }

    if ($save_stx != $stx) {
        $page = 1;
    }
}

if ($sca != "") {
    $where[] = " ca_id like '$sca%' ";
}

if ($cr_state != "") {
    $where[] = " cr_state = '$cr_state' ";
}

if ($fr_date && $to_date) {
    $where[] = " cr_date between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
}

if ($where) {
    $sql_search = ' where '.implode(' and ', $where);
}

if ($sfl == "")  $sfl = "mb_id";
if (!$sst) {
    $sst = "cr_id";
    $sod = "desc";
}

$sql_common = "  from {$g5['coin_req_table']} ";
$sql_common .= $sql_search;
$sql  = " select *
          $sql_common
          order by $sst $sod ";
$result = sql_query($sql);
$cnt = @sql_num_rows($result);
if(!$cnt)
	alert("출력할 자료가 없습니다.");

/** Include PHPExcel */
include_once (G5_LIB_PATH.'/xlsxwriter.class.php');

$filename = '코인구매관리-'.date("ymd", time()).'.xlsx';
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

// table head
$header = array(
    '아이디'=>'string',
    '이름'=>'string',
    '구매금액'=>'price',
    '지급코인'=>'price',
    '입금자명'=>'string',
    '상태'=>'string',
    '요청일자'=>'string',
    '처리일자'=>'string',
);

$data = array();
for(++$i; $row=sql_fetch_array($result); $i++)
{
    array_push($data, array($row['mb_id'],
        $row['mb_name'],
        $row['cr_price'],
        $row['cr_coin'],
        $row['cr_account'],
        $gw_status3[$row['cr_state']],
        $row['cr_date'],
        $row['cr_uptime']));
}

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $exc_row)
    $writer->writeSheetRow('Sheet1', $exc_row);

$writer->writeToStdOut();
exit(0);
?>
