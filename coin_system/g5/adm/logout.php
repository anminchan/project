<?php
define('G5_CERT_IN_PROG', true);
include_once ('../common.php');

if(function_exists('social_provider_logout')){
    social_provider_logout();
}

// 이호경님 제안 코드
session_unset(); // 모든 세션변수를 언레지스터 시켜줌
session_destroy(); // 세션해제함

// 자동로그인 해제 --------------------------------
set_cookie('ck_mb_id', '', 0);
set_cookie('ck_auto', '', 0);
// 자동로그인 해제 end --------------------------------

// 강제로그인페이지
$link = G5_ADMIN_URL.'/login.php';

goto_url($link);