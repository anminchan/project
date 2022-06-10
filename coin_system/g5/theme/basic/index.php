<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$is_member){
    //alert('회원 전용 서비스 입니다.', G5_BBS_URL.'/login.php?url='.urlencode($url));
    goto_url(G5_BBS_URL.'/login.php?url='.urlencode($url));
}

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

/*if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}*/

include_once(G5_THEME_PATH.'/head.php');

?>
<?php

// 코인신청목록
/*$sql = " select * from `{$g5['coin_req_table']}` where mb_id = '{$member['mb_id']}' order by cr_id desc limit 5 ";
$result = sql_query($sql);*/

$sql = " select ifnull(sum(if(cr_state='1', cr_coin, 0)), 0)as s_coin_sum, ifnull(sum(if(cr_state='5', cr_coin, 0)), 0)as b_coin_sum from `{$g5['coin_req_table']}` where mb_id = '{$member['mb_id']}' ";
$coin_sum = sql_fetch($sql);

?>
<style type="text/css">
    button{border:none;text-align:right;}
    .custom_data_table{overflow:hidden;border:1px solid #D5D5D5;border-radius:20px;}
    .custom_data_table .c_data_table_head{background:#C8D8E4;}
    .custom_data_table .c_data_table_body{background:#fff;}
    .custom_data_table .c_data_table_row{border-top:1px solid #D5D5D5;font-size:0;}
    .custom_data_table .c_data_table_head .c_data_table_row{border-top-width:0;}
    .custom_data_table .c_data_table_col{display:inline-block;height:60px;padding:15px 0;color:#232323;font-size:20px;line-height:30px;text-align:center;}
    .custom_data_table .c_data_table_col.date{width:27%;padding-left:25px;text-align:left;}
    .custom_data_table .c_data_table_col.sales{width:17%;}
    .custom_data_table .c_data_table_col.state{width:15%;}
    .custom_data_table .c_data_table_col.coin{width:17%;}
    .custom_data_table .c_data_table_col.amount{width:24%;}
    .custom_data_table .custom_circle{display:inline-block;width:87px;padding:5px 0;border-radius:100px;color:#fff;}
    .custom_data_table .custom_circle.type01{background:#0098E1;}
    .custom_data_table .custom_circle.type02{background:#009F5E;}
    .custom_data_table .custom_circle.type03{background:#E20000;}
    .custom_data_table .c_data_table_body .c_data_table_col.state{line-height:1;}

    .main_wrap{padding:20px 27px 25px 20px;background:#F2F2F2;}
    .main_wrap [class^="main_section_"]{position:relative;margin-bottom:45px;}
    .main_wrap .main_title{margin:0 0 15px;color:#232323;font-size:20px;line-height:1;}
    .main_wrap .main_section_top{display:flex;flex-flow:row wrap;justify-content:space-between;}
    .main_wrap .main_section_top .main_top_title{width:581px;height:224px;padding:40px 30px;border-radius:20px;background:no-repeat url("/img/main_img1.jpg") center center / cover;}
    .main_wrap .main_section_top .main_top_title .main_top_title_line{display:block;color:#fff;font-size:20px;}
    .main_wrap .main_top_btn_wrap{display:flex;flex-flow:column wrap;justify-content:space-between;width:282px;}
    .main_wrap .main_middle_btn_wrap{display:flex;flex-flow:row wrap;justify-content:space-between;}
    .main_wrap [class^="btn_main_"]{display:inline-block;position:relative;width:100%;height:105px;padding:0 25px 0 83px;border:1px solid #D5D5D5;border-radius:20px;text-align:right;}
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
    .main_wrap .main_section_middle [class^="btn_main_"]{width:calc(50% - 10px);}
    .main_wrap .main_section_middle [class^="btn_main_"] [class^="icon_"]{left:20px;}
    .main_wrap .btn_main_type02 .title_btn,
    .main_wrap .btn_main_type02 .cnt_btn{color:#fff;}
    .main_wrap .btn_more{display:inline-bl;position:absolute;top:-1px;right:0;width:28px;height:28px;background:no-repeat url(/img/ig_main.svg) 0 -238px;font-size:0;}

</style>

<div class="main_wrap">
    <section class="main_section_top">
        <div class="main_top_title">
            <span class="main_top_title_line">newfound Foundaion</span>
            <span class="main_top_title_line">Global newfound Coin 구매 결제 사이트</span>
        </div>
        <div class="main_top_btn_wrap">
            <button type="button" class="btn_main_type01" onclick="location.href='<?php echo G5_BBS_URL ?>/coin_change_form.php'">
                <i class="icon_usd1"></i>
                <span class="cnt_wrap">
                <span class="title_btn">Availiable Balance</span>
                <span class="cnt_btn"><span class="number_st_big"><?php echo $member['mb_coin'] ?></span> coin</span>
            </span>
            </button>
            <a class="btn_main_type02" href="<?php echo G5_BBS_URL ?>/coin_request_form.php">
                <i class="icon_cart"></i>
                <span class="cnt_wrap">
                <span class="title_btn">BUY NOW</span>
                <span class="cnt_btn">코인구매</span>
            </span>
            </a>
        </div>
    </section>

    <section class="main_section_middle">
        <h2 class="main_title">Total History</h2>
        <div class="main_middle_btn_wrap">
            <button type="button" class="btn_main_type01">
                <i class="icon_usd2"></i>
                <span class="cnt_wrap">
                <span class="title_btn">총 코인 구매</span>
                <span class="cnt_btn"><span class="number_st_big"><?php echo $coin_sum['s_coin_sum']; ?></span> coin</span>
            </span>
            </button>
            <button type="button" class="btn_main_type01">
                <i class="icon_refresh"></i>
                <span class="cnt_wrap">
                <span class="title_btn">총 코인 전환</span>
                <span class="cnt_btn c_red"><span class="number_st_big"><?php echo $coin_sum['b_coin_sum']; ?></span> coin</span>
            </span>
            </button>
        </div>
    </section>

    <!--<section class="main_section_bottom">
        <form name="form" action="<?php /*echo G5_URL */?>/api/sso/sso.php" method="post">
            <input type="hidden" name="mb_id" value="<?php /*echo $member['mb_id']*/?>"/>
            <input type="hidden" name="authKey" value="<?php /*echo $config['cf_3']*/?>"/>
        </form>
        <a href="javascript:;" onclick="fnsso();">sso</a>
    </section>-->
    
    <!--<section class="main_section_bottom">
        <h2 class="main_title">Recent Purchase History</h2>
        <button type="button" class="btn_more" onclick="location.href='<?php /*echo G5_BBS_URL */?>/coin_request.php'">더보기</button>
        <div class="custom_data_table">
            <div class="c_data_table_head">
                <div class="c_data_table_row">
                    <span class="c_data_table_col date">DATE</span>
                    <span class="c_data_table_col sales">SALES</span>
                    <span class="c_data_table_col state">STATE</span>
                    <span class="c_data_table_col coin">COIN</span>
                    <span class="c_data_table_col amount">AMOUNT</span>
                </div>
            </div>
            <div class="c_data_table_body">
                <?php
/*                    for ($i=0; $row=sql_fetch_array($result); $i++) {
                        $state_val = '';
                        if ( $row['cr_state'] == 0 ) $state_val = "<span class=\"custom_circle type01 \">".$gw_status[$row['cr_state']]."</span>";
                        if ( $row['cr_state'] == 1 ) $state_val = "<span class=\"custom_circle type02 \">".$gw_status[$row['cr_state']]."</span>";
                        if ( $row['cr_state'] == 2 ) $state_val = "<span class=\"custom_circle type03 \">".$gw_status[$row['cr_state']]."</span>";
                        if ( $row['cr_state'] == 5 ) $state_val = "<span class=\"custom_circle type01 \">".$gw_status[$row['cr_state']]."</span>";
                        if ( $row['cr_state'] == 6 ) $state_val = "<span class=\"custom_circle type02 \">".$gw_status[$row['cr_state']]."</span>";
                        if ( $row['cr_state'] == 7 ) $state_val = "<span class=\"custom_circle type03 \">".$gw_status[$row['cr_state']]."</span>";
                */?>
                    <div class="c_data_table_row">
                        <span class="c_data_table_col date"><?php /*echo $row['cr_date']; */?></span>
                        <span class="c_data_table_col sales"><?php /*echo $gw_status2[$row['cr_state']]; */?></span>
                        <span class="c_data_table_col state"><?php /*echo $state_val; */?></span>
                        <span class="c_data_table_col coin"><?php /*echo number_format($row['cr_coin']); */?> COIN</span>
                        <span class="c_data_table_col amount">￦ <?php /*echo number_format($row['cr_price']); */?> KRW</span>
                    </div>
                <?php /*} */?>
            </div>
        </div>
    </section>-->
</div>
<script>
    function fnsso(){
        var gsWin = window.open("about:blank", "Wincoin");
        var frm = document.form;
        frm.target = "Wincoin";
        frm.submit();
    }
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');