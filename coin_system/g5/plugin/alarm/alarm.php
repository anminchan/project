<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가
// 간격
//echo help('기본 60000ms, 밀리초(ms)는 천분의 1초. ex) 60초 = 60000ms');
$wset['delay'] = '60000';
$wset['delay'] = (isset($wset['delay']) && $wset['delay'] >= 60000) ? $wset['delay'] : 60000;
$alarm_url = G5_PLUGIN_URL."/alarm";
?>

<?php 
//특정 페이지에서 alarm 표시안함
$except_alarm_page = '';
if ($is_admin == 'super' || $member['mb_level'] >= 9 ) {
    $except_alarm_page = array('auth_list.php',
        'config_form.php',
        'member_list.php',
        'visit_search.php',
        'visit_list.php',
        'coin_changelist.php');

    $gubun = 'admin';
} else {
    $except_alarm_page = array('auth_list.php',
        'config_form.php',
        'member_list.php',
        'visit_search.php',
        'visit_list.php',
        'coin_reqlist.php',
        'coin_reqinoutlist.php',
        'coin_reqcalculatelist.php',
        'coin_reqhistorylist.php');

    $gubun = 'view_admin';
}

print_r($except_alarm_page);
if (!in_array(basename($_SERVER['PHP_SELF']), $except_alarm_page))
{ 
	if ($member['mb_id'])
	{
?>

<link rel="stylesheet" href="<?php echo $alarm_url ?>/alarm.css">
<script>
var memo_alarm_url = "<?php echo $alarm_url;?>";
var audio = new Audio("<?php echo $alarm_url;?>/memo_on.mp3");  // 임의 폴더 아래에 사운드 파일을 넣고 자바스크립트 동일경로 
</script>
<script src="<?php echo $alarm_url ?>/alarm.js"></script>
<script type="text/javascript">
    $(function() {
        var gubun = "<?php echo $gubun; ?>";

        setInterval(function() {
            check_alarm(gubun);
        }, <?php echo $wset['delay'] ?>);
        check_alarm(gubun);
    });
</script>
<?php } ?>
<?php } ?>