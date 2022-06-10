<?php
include_once('../../../common.php');

// 로그인 성공한 회원 아이디
$mb_id = trim($_POST['mb_id']);
$authKey = trim($_POST['authKey']);
//echo "아이디:".trim($mb_id);
//echo "보안키:".trim($authKey);

if(!$mb_id || !$authKey) {
    alert_close('관리자 문의바랍니다.(파라메타 확인필요)');
}

if( $authKey != trim($config['cf_3']) ) {
    alert_close('관리자 문의바랍니다.(토큰정보 불일치)');
}

if($mb_id && $authKey) {
    $mb = get_member($mb_id);

    if (!$mb['mb_id']) {
        alert_close('관리자 문의바랍니다.(회원정보 존재하지 않음)');
    }
    // 차단된 아이디인가?
    if ($mb['mb_intercept_date'] && $mb['mb_intercept_date'] <= date("Ymd", G5_SERVER_TIME)) {
        $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $mb['mb_intercept_date']);
        alert_close('회원님의 아이디는 접근이 금지되어 있습니다.\n처리일 : '.$date);
    }

    // 탈퇴한 아이디인가?
    if ($mb['mb_leave_date'] && $mb['mb_leave_date'] <= date("Ymd", G5_SERVER_TIME)) {
        $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $mb['mb_leave_date']);
        alert_close('탈퇴한 아이디이므로 접근하실 수 없습니다.\n탈퇴일 : '.$date);
    }

    // 회원아이디 세션 생성
    set_session('ss_mb_id', $mb['mb_id']);
    // FLASH XSS 공격에 대응하기 위하여 회원의 고유키를 생성해 놓는다. 관리자에서 검사함 - 110106
    set_session('ss_mb_key', md5($mb['mb_datetime'] . get_real_client_ip() . $_SERVER['HTTP_USER_AGENT']));

    goto_url(G5_URL);
}else{
    alert_close('관리자 문의바랍니다.');
}

?>
