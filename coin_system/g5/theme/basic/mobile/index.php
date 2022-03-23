<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$is_member)
    alert('회원 전용 서비스 입니다.', G5_BBS_URL.'/login.php?url='.urlencode($url));

/*if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}*/

include_once(G5_THEME_MOBILE_PATH.'/head.php');
?>
<?php

// 코인신청목록
$sql = " select * from `{$g5['coin_req_table']}` where mb_id = '{$member['mb_id']}' order by cr_id desc limit 5 ";
$result = sql_query($sql);

$sql = " select sum(if(cr_state='2', cr_coin, 0))as s_coin_sum, sum(if(cr_state='5', cr_coin, 0))as b_coin_sum from `{$g5['coin_req_table']}` where mb_id = '{$member['mb_id']}' ";
$coin_sum = sql_fetch($sql);

?>
<style type="text/css">
    button{border:none;text-align:right;}
    .custom_data_table{overflow:hidden;border:1px solid #D5D5D5;border-radius:20px;}
    .custom_data_table .c_data_table_head{background:#C8D8E4;}
    .custom_data_table .c_data_table_body{background:#fff;}
    .custom_data_table .c_data_table_row{position:relative;padding:5px 0;border-top:1px solid #D5D5D5;font-size:0;}
    .custom_data_table .c_data_table_body .c_data_table_row:first-child{border-top-width:0;}
    .custom_data_table .c_data_table_col{display:block;padding:7px 15px 7px 0;color:#232323;font-size:20px;line-height:30px;text-align:right;}
    .custom_data_table .c_data_table_col.amount.sales{font-size:16px;}
    .custom_data_table .c_data_table_col.coin{padding:0 0 0 20px;font-size:30px;text-align:left;}
    .custom_data_table .c_data_table_col.state{position:absolute;top:41px;right:0;text-align:center;}
    .custom_data_table .c_data_table_col.date{font-size:14px;}
    .custom_data_table .c_data_table_col.date:before{content:'';display:inline-block;width:16px;height:16px;margin:-2px 5px 0 0;background:no-repeat url(/img/ig_main.svg) 0 -266px;vertical-align:middle;}


    .custom_data_table .custom_circle{display:inline-block;width:70px;padding:5px 0;border-radius:100px;color:#fff;font-size:15px;}

    .custom_data_table .custom_circle.type01{background:#0098E1;}
    .custom_data_table .custom_circle.type02{background:#009F5E;}
    .custom_data_table .custom_circle.type03{background:#E20000;}
    .custom_data_table .c_data_table_body .c_data_table_col.state{line-height:1;}


    .main_wrap{padding:20px 27px 25px 20px;background:#F2F2F2;}
    .main_wrap [class^="main_section_"]{position:relative;margin-bottom:25px;}
    .main_wrap .main_title{margin:0 0 15px;color:#232323;font-size:20px;line-height:1;}
    .main_wrap .main_section_top .main_top_title{width:581px;height:224px;padding:40px 30px;border-radius:20px;background:no-repeat url("/img/main_img1.jpg") center center / cover;}
    .main_wrap .main_section_top .main_top_title .main_top_title_line{display:block;color:#fff;font-size:20px;}

    .main_wrap .main_middle_btn_wrap{display:flex;flex-flow:row wrap;justify-content:space-between;}
    .main_wrap [class^="btn_main_"]{display:inline-block;position:relative;width:100%;height:105px;margin:0 0 10px;padding:0 25px 0 83px;border:1px solid #D5D5D5;border-radius:20px;text-align:right;}
    .main_wrap [class^="btn_main_"]:before{content: '';display: inline-block;height:100%;vertical-align:middle;}
    .main_wrap [class^="btn_main_"] .cnt_wrap{display: inline-block;vertical-align:middle;}
    .main_wrap [class^="btn_main_"] [class^="icon_"]{display:block;position:absolute;top:50%;left:10px;background:no-repeat url(/img/ig_main.svg);transform:translateY(-50%);}
    .main_wrap [class^="btn_main_"] .icon_usd1{width:62px;height:62px;background-position:0 0;}
    .main_wrap [class^="btn_main_"] .icon_usd2{width:71px;height:57px;background-position:0 -116px;}
    .main_wrap [class^="btn_main_"] .icon_cart{width:54px;height:54px;background-position:0 -62px;}
    .main_wrap [class^="btn_main_"] .icon_refresh{width:61px;height:61px;background-position:0 -177px;}
    .main_wrap [class^="btn_main_"] .title_btn{display:block;margin:0 0 10px;color:#232323;font-size:20px;line-height:1;}
    .main_wrap [class^="btn_main_"] .cnt_btn{display:block;color:#009F5E;font-size:20px;line-height:1;}
    .main_wrap [class^="btn_main_"] .cnt_btn.c_red{color:#E20000;}
    .main_wrap [class^="btn_main_"] .cnt_btn .number_st_big{font-size:30px;}

    .main_wrap .btn_main_type01{background:#fff;}
    .main_wrap .btn_main_type02{background:#009F5E;}

    .main_wrap .main_section_middle [class^="btn_main_"] [class^="icon_"]{left:20px;}
    .main_wrap .btn_main_type02 .title_btn,
    .main_wrap .btn_main_type02 .cnt_btn{color:#fff;}

    .main_wrap .btn_more{display:inline-block;position:absolute;top:-1px;right:0;width:28px;height:28px;background:no-repeat url(/img/ig_main.svg) 0 -238px;font-size:0;}

</style>

<div class="main_wrap">
    <section class="main_section_top">
        <div class="main_top_btn_wrap">

            <h2 class="main_title">Total History</h2>
            <a class="btn_main_type02" href="<?php echo G5_BBS_URL ?>/coin_request_form.php">
                <i class="icon_cart"></i>
                <span class="cnt_wrap">
                <span class="title_btn">BUY NOW</span>
                <span class="cnt_btn">코인구매</span>
            </span>
            </a>
            <button type="button" class="btn_main_type01">
                <i class="icon_usd1"></i>
                <span class="cnt_wrap">
                <span class="title_btn">Availiable Balance</span>
                <span class="cnt_btn"><span class="number_st_big"><?php echo $member['mb_coin'] ?></span> coin</span>
            </span>
            </button>
        </div>
    </section>

    <section class="main_section_bottom">
        <h2 class="main_title">Recent Purchase History</h2>
        <button type="button" class="btn_more" onclick="location.href='<?php echo G5_BBS_URL ?>/coin_request.php'">더보기</button>
        <div class="custom_data_table">
            <div class="c_data_table_body">
                <?php
                for ($i=0; $row=sql_fetch_array($result); $i++) {
                    $state_val = '';
                    if ( $row['cr_state'] == 0 ) $state_val = "<span class=\"custom_circle type01 \">".$gw_status[$row['cr_state']]."</span>";
                    if ( $row['cr_state'] == 1 ) $state_val = "<span class=\"custom_circle type02 \">".$gw_status[$row['cr_state']]."</span>";
                    if ( $row['cr_state'] == 2 ) $state_val = "<span class=\"custom_circle type03 \">".$gw_status[$row['cr_state']]."</span>";
                    ?>
                    <div class="c_data_table_row">
                        <span class="c_data_table_col amount sales">￦ <?php echo number_format($row['cr_price']); ?> KRW / <?php echo $gw_status2[$row['cr_state']]; ?></span>
                        <span class="c_data_table_col coin"><?php echo number_format($row['cr_coin']); ?> COIN</span>
                        <span class="c_data_table_col state"><?php echo $state_val; ?></span>
                        <span class="c_data_table_col date"><?php echo $row['cr_date']; ?></span>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
</div>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');