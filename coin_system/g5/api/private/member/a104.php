<?php
include_once('../../../common.php');
//include_once(TB_LIB_PATH.'/json.lib.php');
header("Content-Type: application/json; charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);ini_set('display_errors', '1');

include_once('../../access-token/include.php');

$method = $_SERVER["REQUEST_METHOD"];
$method_approval[] = "POST";
$data = array();
if(!in_array($method, $method_approval)) {
    $json_data = ['success' => false, 'code' => "401", 'message' => 'Bad Request', 'error' => 'REQUEST METHOD 오류 입니다.', 'data' => ""];
    die(json_encode($json_data));
}

$check_required = true;
//필수항목체크
$required = array();
array_push($required, 'tx_id','mb_id','delete_type');
foreach ($required as $key => $value) {
    if(!isset($_POST[$value]) || trim($_POST[$value]) == null) {
        $check_required = false;
        $msg = $value.' 필수값이 누락되었습니다.';
        break;
    }
}

unset($required);
//검증오류 발생시 처리
if(!$check_required) {
    $json_data = ['success' => false, 'code' => "400", 'message' => 'Bad Request', 'error' => $msg, 'data' => ""];
    die(json_encode($json_data));
}

$mb = get_member($_POST['mb_id']);
if( !$mb['mb_id'] ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '등록된 회원이 아닙니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level'] > 2 ) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '해당 회원은 삭제할 수 없습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if( $mb['mb_level'] < 2 && !$mb['mb_password']) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '이미 삭제된 회원입니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if (is_admin($mb['mb_id']) == 'super') {
    $json_data = ['success' => true, 'code' => "200", 'message' => '최고관리자는 삭제할 수 없습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
} else if ($is_admin != 'super' && $mb['mb_level'] > 2) {
    $json_data = ['success' => true, 'code' => "200", 'message' => '자신보다 권한이 높은 회원은 삭제할 수 없습니다.', 'error' => null, 'data' => ""];
    die(json_encode($json_data));
}

if($_POST['delete_type']=='D'){
    // 회원자료 삭제
    member_delete($mb['mb_id']);
}elseif ($_POST['delete_type']=='H'){
    $sql = " update {$g5['member_table']}
                set mb_intercept_date = '".str_replace('-', '', G5_TIME_YMD)."' where mb_id = '{$mb['mb_id']}' ";
    sql_query($sql);
}elseif ($_POST['delete_type']=='R'){
    $sql = " update {$g5['member_table']}
                set mb_intercept_date = '' where mb_id = '{$mb['mb_id']}' ";
    sql_query($sql);
}

$json_data = ['success' => true, 'code' => "200", 'message' => '회원 상태가 변경 되었습니다.', 'error' => null, 'data' => ''];

die(json_encode($json_data));
exit;
?>
