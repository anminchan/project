<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가;

// 주문단계
$gw_status = array(
    "0"	=>"입금요청",
    "1"	=>"입금완료",
    "2"	=>"입금취소",
    "3"	=>"증감",
    "4"	=>"차감",
    "5"	=>"전환"
);

$gw_status2 = array(
    "0"	=>"구매",
    "1"	=>"구매",
    "2"	=>"구매",
    "3"	=>"증감",
    "4"	=>"차감",
    "5"	=>"전환"
);

$gw_status3 = array(
    "1"	=>"판매승인",
    "2"	=>"판매취소",
    "3"	=>"증감",
    "4"	=>"차감",
    "5"	=>"전환"
);