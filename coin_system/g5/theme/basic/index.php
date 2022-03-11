<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$is_member)
    alert('회원 전용 서비스 입니다.', G5_BBS_URL.'/login.php?url='.urlencode($url));

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<h2 class="sound_only">최신글</h2>

<div class="latest_top_wr">
    <img src="<?php echo G5_IMG_URL;?>/sample_main.png">
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');