<?php
include_once('./_common.php');

$refresh_token = $_POST['refresh_token'];
$access_token = $_POST['access_token'];
$user_id = $_POST['user_id'];
$user_password = $_POST['user_password'];
$mb_id = $_POST['mb_id'];
$mb_wallet_addr = $_POST['mb_wallet_addr'];
$cr_coin = $_POST['cr_coin'];
$gubun = $_POST['gubun'];
$api_url = G5_URL.'/api';
$method = "POST";
$param = "";
$result = "";

if($gubun=='ac'){
    $api_url .= '/private/auth/access.php';
}elseif($gubun=='mc'){
    $api_url .= '/private/member/a102.php';
    $param = array('tx_id'=>'1234', 'mb_id'=>$user_id, 'mb_password'=>$user_password, 'mb_name'=>$user_id, 'mb_bank_nm'=>'은행', 'mb_bank_account'=>'0000000000000', 'mb_bank_holder'=>$user_id);
}elseif ($gubun=='mv'){
    $api_url .= '/private/member/a101.php';
    $param = array('tx_id'=>'1234', 'mb_id'=>$mb_id);
}elseif ($gubun=='ml'){
    $api_url .= '/private/member/a106.php';
    $param = array('tx_id'=>'1234');
}elseif ($gubun=='md'){
    $api_url .= '/private/member/a104.php';
    $param = array('tx_id'=>'1234', 'mb_id'=>$mb_id, 'delete_type'=>'D');
}elseif ($gubun=='cv'){
    $method = "GET";
    $api_url .= '/public/coin/a201.php?address='.$mb_wallet_addr;
}elseif ($gubun=='cb'){
    $api_url .= '/private/coin/a302.php';
    $param = array('tx_id'=>'1234', 'mb_id'=>$mb_id, 'to_address'=>$config['cf_1'], 'balance'=>$cr_coin);
}elseif ($gubun=='cl'){
    $api_url .= '/private/coin/a206.php';
}

if($method == "POST"){
    $post_data = json_encode($param);

    if($gubun=='ac'){
        $header_data = array(
            'Authorization: '.$refresh_token,
            'Content-Type: application/json; charset=utf-8'
        );
    }else{
        $header_data = array(
            'Authorization: '.$access_token,
            'Content-Type: application/json; charset=utf-8'
        );
    }

    $ch = curl_init($api_url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => $header_data,
        CURLOPT_POSTFIELDS => $post_data
    ));

    $response = curl_exec($ch);

    die($response);

}elseif($method == "GET"){
    $header_data = array(
        'Authorization: '.$access_token,
        'Content-Type: application/json; charset=utf-8'
    );
    $ch = curl_init(); //curl 사용 전 초기화 필수(curl handle)
    curl_setopt($ch, CURLOPT_URL, $api_url); //URL 지정하기
    curl_setopt($ch, CURLOPT_HEADER, true);//헤더 정보를 보내도록 함(*필수)
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header_data); //header 지정하기
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); //이 옵션이 0으로 지정되면 curl_exec의 결과값을 브라우저에 바로 보여줌. 이 값을 1로 하면 결과값을 return하게 되어 변수에 저장 가능(테스트 시 기본값은 1)
    $response  = curl_exec ($ch);

    die($response);

}

