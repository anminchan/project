<?php
include_once('./_common.php');

$mb_id = isset($_SESSION['ss_mb_id']) ? trim($_SESSION['ss_mb_id']) : '';

if(!$mb_id)
    die(json_encode(array('msg'=>'N')));

$ss_mb_10 = get_session('ss_mb_10_ss');
if($member){
    if( $ss_mb_10 != $member['mb_10']){
        if(function_exists('social_provider_logout')){
            social_provider_logout();
        }
        session_unset(); // 모든 세션변수를 언레지스터 시켜줌
        session_destroy(); // 세션해제함
        die(json_encode(array('msg'=>'Y')));
    }
}

die(json_encode(array('msg'=>'N')));
