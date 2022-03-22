<?php
include_once('./_common.php');

$act = $_POST['act'];

if ($act =='alarm') {
	$result = array();

	//$row = sql_fetch(" select * from {$g5['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_send_datetime >= NOW() - INTERVAL 2 DAY and me_read_datetime = '0000-00-00 00:00:00' order by me_id desc limit 1");
    $row = sql_fetch(" select * from {$g5['coin_req_table']} where cr_state = 0 and cr_date >= NOW() - INTERVAL 1 HOUR order by cr_id desc limit 1 ");

    if ($row) {
		$result['content'] = $row['mb_name'].' 님께서 '.$row['cr_coin'].' Coin을 신청하셨습니다.';
		$result['msg'] = 'SUCCESS';
		$result['cr_id'] = $row['cr_id'];
		//$result['sound'] = 'N';
		$result['title'] = $row['mb_name'];
		$result['url'] = G5_ADMIN_URL . '/coin_reqlist.php?cr_state=0';
	}else{
		$result['msg'] = 'NOMSG';
		$result['cr_id'] = '';
	}
	echo json_encode($result);		
}
if($act == "recv_memo"){
	$result = array();	
	$result['msg'] = 'SUCCESS';
	
	echo json_encode($result);	
}
