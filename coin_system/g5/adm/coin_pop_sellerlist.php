<?php
$sub_menu = '300900';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$html_title = '판매자 리스트';

$g5['title'] = $html_title;
include_once(G5_PATH.'/head.sub.php');

function getnerate_random_string($length){
    $string = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $string_length = strlen($string);
    $random_string = '';
    for($i = 0; $i < $length; $i++){
        $random_string .= $string[rand(0, $string_length-1)];
    }
    return $random_string;
}

$acc = sql_fetch(" select * from {$g5['account_table']} where (mb_id is null or mb_id = '') order by ac_id desc limit 1 ");
if($acc['ac_id']){
    $mb_id = 'seller_'.getnerate_random_string(4).$acc['ac_id'];
    $wallet = bin2hex(openssl_random_pseudo_bytes(16));

    $mb = get_member($mb_id);
    if (isset($mb['mb_id']) && $mb['mb_id'])
        alert('이미 존재하는 회원아이디입니다.\\nＩＤ : '.$mb['mb_id'].'\\n이름 : '.$mb['mb_name'].'\\n닉네임 : '.$mb['mb_nick']);

    // 판매자 아이디 생성
    sql_query(" insert into {$g5['member_table']} set mb_id = '{$mb_id}', mb_password = '".get_encrypt_string($mb_id.'qwe123!@#')."', mb_name = '{$mb_id}', mb_nick = '{$mb_id}', mb_level = '5', mb_wallet_addr = '{$wallet}', mb_datetime = '".G5_TIME_YMDHIS."', mb_ip = '{$_SERVER['REMOTE_ADDR']}', mb_1 = 'seller' ");

    // 판매자권한
    $result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '200100', au_auth = 'r' ", FALSE);
    $result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300910', au_auth = 'r, w' ", FALSE);
    $result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300920', au_auth = 'r, w' ", FALSE);
    $result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300930', au_auth = 'r, w' ", FALSE);
    $result = sql_query(" insert into {$g5['auth_table']} set mb_id = '$mb_id', au_menu = '300940', au_auth = 'r, w' ", FALSE);

    // 판매자 추가
    $sql = "update {$g5['account_table']} set mb_id = '$mb_id' where ac_id = '{$acc['ac_id']}' and (mb_id is null or mb_id = '') ";
    sql_query($sql);

    // 중지된 판매자아이디 차단
    $sql_up = " update g5_member set  mb_intercept_date = '".date('Ymd', G5_SERVER_TIME)."' where mb_id in(select mb_id from g5_account where ac_state = 0) and mb_level = '5' ";
    sql_query($sql_up);
}

$sql_common = " from {$g5['account_table']} ";
$sql_where = " where (1) ";

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common . $sql_where;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

//$rows = $config['cf_page_rows'];
$rows = 5;
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $total_count - (($page-1)*$rows);

$sql = " select *
            $sql_common
            $sql_where
            order by ac_id desc
            limit $from_record, $rows ";
$result = sql_query($sql);

$qstr1 = 'mb_id='.urlencode($mb_id);
?>
    <div id="sch_member_frm" class="new_win scp_new_win">
        <h1>판매자 리스트</h1>

        <form name="fmember" method="get">
            <div class="tbl_head01 tbl_wrap new_win_con">
                <table>
                    <caption>리스트</caption>
                    <thead>
                    <tr>
                        <th>판매자아이디</th>
                        <th>계좌정보</th>
                        <th>관리</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=0; $row=sql_fetch_array($result); $i++) {
                        $bank_info = $row['ac_name'].' '.$row['ac_holder'].' '.$row['account'];
                        ?>
                        <tr>
                            <td class="td_id"><?php echo $row['mb_id']; ?></td>
                            <td class="td_bank"><?php echo $bank_info; ?></td>
                            <td class="td_mng"><a href="./coin_pop_sellerform.php?ac_id=<?php echo $row['ac_id']; ?>" class="btn btn_02">코인조회</a></td>
                        </tr>
                        <?php
                    }

                    if($i ==0)
                        echo '<tr><td colspan="3" class="empty_table">검색된 자료가 없습니다.</td></tr>';
                    ?>
                    </tbody>
                </table>
            </div>
        </form>

        <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr1.'&amp;page='); ?>

        <!--<div class="btn_confirm01 btn_confirm win_btn">
            <button type="button" onclick="window.close();" class="btn_close btn">닫기</button>
        </div>-->
    </div>
<?php
include_once(G5_PATH.'/tail.sub.php');