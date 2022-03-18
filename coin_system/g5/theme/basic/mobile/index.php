<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$is_member)
    alert('회원 전용 서비스 입니다.', G5_BBS_URL.'/login.php?url='.urlencode($url));

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_MOBILE_PATH.'/head.php');
?>

<!-- 메인화면 최신글 시작 -->
<?php

?>

<img src="<?php echo G5_IMG_URL;?>/sample_main_MO.png" width="100%">

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');