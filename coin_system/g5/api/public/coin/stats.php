<?php
//include_once('./_common.php');
include_once('../../../common.php');
header("Content-Type: application/json; charset=utf-8");

$return['resultCode'] = "200";

$fr_date = isset($_GET['fr_date']) ? trim($_GET['fr_date']) : '';
$to_date = isset($_GET['to_date']) ? trim($_GET['to_date']) : '';

if(!$fr_date) $fr_date = date("Y-m-d");
if(!$to_date) $to_date = date("Y-m-d");

$sql = " select '{$config['cf_title']}' as coin_system,
        ifnull(sum(if(a.cr_state=0, cr_coin, 0)), 0) as sum_coin0,
        ifnull(sum(if(a.cr_state=1, cr_coin, 0)), 0) as sum_coin1,
        ifnull(sum(if(a.cr_state=2, cr_coin, 0)), 0) as sum_coin2,
        ifnull(sum(if(a.cr_state=3, cr_coin, 0)), 0) as sum_coin3,
        ifnull(sum(if(a.cr_state=4, cr_coin, 0)), 0) as sum_coin4,
        ifnull(sum(if(a.cr_state=5, cr_coin, 0)), 0) as sum_coin5,
        ifnull(sum(if(a.cr_state=1, cr_price, 0)), 0) as sum_price1
        from {$g5['coin_req_table']} a left join  {$g5['member_table']} b
        on a.mb_id = b.mb_id
        where a.cr_date BETWEEN concat('$fr_date',' 00:00:00') and concat('$to_date',' 23:59:59')
        and b.mb_level = '2' ";
$data = sql_query($sql);

foreach ($data as $key => $value) {
    $return['data'][$key]['coin_system']    = $value['coin_system'];
    $return['data'][$key]['sum_coin0']      = $value['sum_coin0'];
    $return['data'][$key]['sum_coin1']      = $value['sum_coin1'];
    $return['data'][$key]['sum_coin2']      = $value['sum_coin2'];
    $return['data'][$key]['sum_coin3']      = $value['sum_coin3'];
    $return['data'][$key]['sum_coin4']      = $value['sum_coin4'];
    $return['data'][$key]['sum_coin5']      = $value['sum_coin5'];
    $return['data'][$key]['sum_coin5']      = $value['sum_coin5'];
    $return['data'][$key]['sum_price1']     = $value['sum_price1'];
}

die(json_encode($return, JSON_UNESCAPED_UNICODE));
exit();

?>