<?php
$sub_menu = '300905';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

function curl_coinSum($domain, $fr_date, $to_date){
    $method = "GET";
    $url = "http://".$domain."/api/public/coin/stats.php?fr_date=".$fr_date."&to_date=".$to_date;
//$url = "http://globalcoin365.com/api/public/coin/stats.php?fr_date=".$fr_date."&to_date=".$to_date;
//$url = "http://globalcoin365.com/api/public/coin/stats.php?fr_date=2022-05-01&to_date=2022-07-01";

    $ch = curl_init();                                 //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
//curl_setopt($ch, CURLOPT_SSLVERSION, 3); // SSL 버젼 (https 접속시에 필요)
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    $response = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

//print_r($response);

    return json_decode($response);
}


$g5['title'] = '업체별매출현황';
include_once (G5_ADMIN_PATH.'/admin.head.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$fr_date = (isset($_GET['fr_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['to_date'])) ? $_GET['to_date'] : '';
if(!$fr_date) $fr_date = date("Y-m-d");
if(!$to_date) $to_date = date("Y-m-d");

$seller_sql = " select * from {$g5['seller_table']} ";
$seller_result = sql_query($seller_sql);

$list = array();
$sum_price1 = $sum_coin1 = $sum_coin2 = $sum_coin3 = $sum_coin4 = 0;
for($i=0; $row=sql_fetch_array($seller_result); $i++) {
    $result = curl_coinSum($row['seller_domain'], $fr_date, $to_date);
    array_push($list, $result);

    $sum_price1 += $result->data[0]->sum_price1;
    $sum_coin1 += $result->data[0]->sum_coin1;
    $sum_coin2 += $result->data[0]->sum_coin5;
    $sum_coin3 += $result->data[0]->sum_coin3;
    $sum_coin4 += $result->data[0]->sum_coin4;
}


//print_r($list);
//exit;

?>
<div class="admin_pg_notice od_test_caution">최대 3개월 범위까지만 조회 가능합니다.</div>

<form class="local_sch03 local_sch">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="save_stx" value="<?php echo $stx; ?>">

    <div class="sch_last">
        <strong>일자</strong>
        <input type="text" id="fr_date"  name="fr_date" value="<?php echo $fr_date; ?>" readonly class="frm_input" size="10" maxlength="10">
        ~ <input type="text" id="to_date"  name="to_date" value="<?php echo $to_date; ?>" readonly class="frm_input" size="10" maxlength="10">
        <button type="button" onclick="javascript:set_date('오늘');">오늘</button>
        <button type="button" onclick="javascript:set_date('어제');">어제</button>
        <button type="button" onclick="javascript:set_date('이번주');">이번주</button>
        <button type="button" onclick="javascript:set_date('이번달');">이번달</button>
        <button type="button" onclick="javascript:set_date('지난주');">지난주</button>
        <button type="button" onclick="javascript:set_date('지난달');">지난달</button>
        <!--<button type="button" onclick="javascript:set_date('전체');">전체</button>-->
        <input type="submit" value="검색" class="btn_submit">
    </div>

    <div class="tbl_head01 tbl_wrap" id="coin_reqcalculatelist">
        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">판매금액</th>
                <th scope="col">판매코인</th>
                <th scope="col">전환코인</th>
                <th scope="col">관리자증가</th>
                <th scope="col">관리자차감</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="td_price">합계</td>
                <td class="td_price"><?php echo number_format($sum_price1); ?></td>
                <td class="td_price"><?php echo number_format($sum_coin1); ?></td>
                <td class="td_price"><?php echo number_format($sum_coin2); ?></td>
                <td class="td_price"><?php echo number_format($sum_coin3); ?></td>
                <td class="td_price"><?php echo number_format($sum_coin4); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</form>

<form name="fcoin_reqlist" method="post" autocomplete="off">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="q1" value="<?php echo $qstr; ?>">

<h2>정산내역</h2>
<div class="tbl_head01 tbl_wrap" id="coin_reqlist">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">업체</th>
        <th scope="col">입금금액</th>
        <th scope="col">판매코인</th>
        <th scope="col">전환코인</th>
        <th scope="col">관리자증가</th>
        <th scope="col">관리자차감</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cnt = count($list);
    for ($i=0; $i<$cnt; $i++) {
        $bg = 'bg'.($i%2);

        $data = $list[$i]->data;
     ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_num"><?php echo $cnt-$i; ?></td>
        <td class="td_name"><?php echo $data[0]->coin_system ?></td>
        <td class="td_price"><b style="color: blue;"><?php echo number_format($data[0]->sum_price1); ?></b></td>
        <td class="td_price"><?php echo number_format($data[0]->sum_coin1); ?></td>
        <td class="td_price"><?php echo number_format($data[0]->sum_coin5); ?></td>
        <td class="td_price"><?php echo number_format($data[0]->sum_coin3); ?></td>
        <td class="td_price"><?php echo number_format($data[0]->sum_coin4); ?></td>
    </tr>
    <?php
    }
    if ($i == 0) {
        echo '<tr><td colspan="7" class="empty_table"><span>자료가 없습니다.</span></td></tr>';
    }
    ?>
    </tbody>
    </table>
</div>

</form>

<script>
$(function(){
    $("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", minDate: "-3m", maxDate: "0d" });

    $(".qa_href").click(function(){
        var $content = $("#qa_div"+$(this).attr("target"));
        $(".qa_div").each(function(index, value){
            if ($(this).get(0) == $content.get(0)) { // 객체의 비교시 .get(0) 를 사용한다.
                $(this).is(":hidden") ? $(this).show() : $(this).hide();
            } else {
                $(this).hide();
            }
        });
    });
});


function set_date(today)
{
    <?php
    $date_term = date('w', G5_SERVER_TIME);
    $week_term = $date_term + 7;
    $last_term = strtotime(date('Y-m-01', G5_SERVER_TIME));
    ?>
    if (today == "오늘") {
        document.getElementById("fr_date").value = "<?php echo G5_TIME_YMD; ?>";
        document.getElementById("to_date").value = "<?php echo G5_TIME_YMD; ?>";
    } else if (today == "어제") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME - 86400); ?>";
    } else if (today == "이번주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$date_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "이번달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', G5_SERVER_TIME); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', G5_SERVER_TIME); ?>";
    } else if (today == "지난주") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-d', strtotime('-'.$week_term.' days', G5_SERVER_TIME)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-d', strtotime('-'.($week_term - 6).' days', G5_SERVER_TIME)); ?>";
    } else if (today == "지난달") {
        document.getElementById("fr_date").value = "<?php echo date('Y-m-01', strtotime('-1 Month', $last_term)); ?>";
        document.getElementById("to_date").value = "<?php echo date('Y-m-t', strtotime('-1 Month', $last_term)); ?>";
    } else if (today == "전체") {
        document.getElementById("fr_date").value = "";
        document.getElementById("to_date").value = "";
    }
}

</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');