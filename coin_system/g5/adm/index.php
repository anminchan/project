<?php
$sub_menu = '100000';
include_once('./_common.php');

@include_once('./safe_check.php');
if(function_exists('social_log_file_delete')){
    social_log_file_delete(86400);      //소셜로그인 디버그 파일 24시간 지난것은 삭제
}

$g5['title'] = '관리자메인';
include_once ('./admin.head.php');

$new_member_rows = 5;
$new_point_rows = 5;
$new_write_rows = 5;

$sql_common = " from {$g5['member_table']} ";

$sql_search = " where (1) ";

if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

// 탈퇴회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_leave_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 차단회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_intercept_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

// 월 가입회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and DATE_FORMAT(mb_datetime, '%Y-%m') >= DATE_FORMAT(now(), '%Y-%m') ";
$row = sql_fetch($sql);
$new_month_count = $row['cnt'];

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$new_member_rows} ";
$result = sql_query($sql);


// 당일 구매 금액
// 승인
$sql = " select sum(cr_price)as sum_price from g5_coin_req where cr_state = 1 and DATE_FORMAT(cr_approval_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') ";
//echo $sql;
$row = sql_fetch($sql);
$cr_approval_sum_price = $row['sum_price'];

// 취소
$sql = " select sum(cr_price)as sum_price as cnt from g5_coin_req where cr_state = 2 and DATE_FORMAT(cr_cancel_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') ";
//echo $sql;
$row = sql_fetch($sql);
$cr_cancel_sum_price = $row['sum_price'];

// 당일 전환 코인
// 전환
$sql = " select sum(cr_coin)as sum_coin from g5_coin_req where cr_state = 5 and DATE_FORMAT(cr_convert_date, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') ";
//echo $sql;
$row = sql_fetch($sql);
$cr_convert_coin = $row['sum_coin'];

// 미전환
//$sql = " select sum(cr_coin)as sum_coin from g5_coin_req where cr_state in (1, 3) ";
$sql = " select sum(mb_coin)as sum_coin from {$g5['member_table']} where mb_leave_date = '' ";
echo $sql;
$row = sql_fetch($sql);
$cr_noconvert_coin = $row['sum_coin'];

$colspan = 12;
?>

<section>
    <h2>현황</h2>
    <div class="sate_vbx">
        <dl class="od_bx1">
            <dt>회원정보</dt>
            <dd>
                <p class="ddtit">전체 회원</p>
                <p><?php echo number_format($total_count) ?> 명</p>
            </dd>
            <dd>
                <p class="ddtit">월 신규</p>
                <p><?php echo number_format($new_month_count) ?> 명</p>
            </dd>
        </dl>

        <dl class="od_bx1">
            <dt>당일 구매 금액</dt>
            <dd>
                <p class="ddtit">승인 금액</p>
                <p><?php echo number_format($cr_approval_sum_price) ?> KRW</p>
            <dd>
                <p class="ddtit">취소 금액</p>
                <p><?php echo number_format($cr_cancel_sum_price) ?> KRW</p>
            </dd>
        </dl>

        <dl class="od_bx1">
            <dt>당일 전환 코인</dt>
            <dd>
                <p class="ddtit">전환 코인</p>
                <p><?php echo number_format($cr_convert_coin) ?> Coin</p>
            <dd>
                <p class="ddtit">미 전환 코인</p>
                <p><?php echo number_format($cr_noconvert_coin) ?> Coin</p>
            </dd>
        </dl>
    </div>
</section>


<section>
    <h2>신규가입회원 <?php echo $new_member_rows ?>건 목록</h2>
    <div class="local_desc02 local_desc">
        총회원수 <?php echo number_format($total_count) ?>명 중 차단 <?php echo number_format($intercept_count) ?>명, 탈퇴 : <?php echo number_format($leave_count) ?>명
    </div>

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption>신규가입회원</caption>
        <thead>
        <tr>
            <th scope="col">회원아이디</th>
            <th scope="col">이름</th>
            <th scope="col">닉네임</th>
            <th scope="col">권한</th>
            <th scope="col">포인트</th>
            <th scope="col">수신</th>
            <th scope="col">공개</th>
            <th scope="col">인증</th>
            <th scope="col">차단</th>
            <th scope="col">그룹</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $row=sql_fetch_array($result); $i++)
        {
            // 접근가능한 그룹수
            $sql2 = " select count(*) as cnt from {$g5['group_member_table']} where mb_id = '{$row['mb_id']}' ";
            $row2 = sql_fetch($sql2);
            $group = "";
            if ($row2['cnt'])
                $group = '<a href="./boardgroupmember_form.php?mb_id='.$row['mb_id'].'">'.$row2['cnt'].'</a>';

            if ($is_admin == 'group')
            {
                $s_mod = '';
                $s_del = '';
            }
            else
            {
                $s_mod = '<a href="./member_form.php?$qstr&amp;w=u&amp;mb_id='.$row['mb_id'].'">수정</a>';
                $s_del = '<a href="./member_delete.php?'.$qstr.'&amp;w=d&amp;mb_id='.$row['mb_id'].'&amp;url='.$_SERVER['SCRIPT_NAME'].'" onclick="return delete_confirm(this);">삭제</a>';
            }
            $s_grp = '<a href="./boardgroupmember_form.php?mb_id='.$row['mb_id'].'">그룹</a>';

            $leave_date = $row['mb_leave_date'] ? $row['mb_leave_date'] : date("Ymd", G5_SERVER_TIME);
            $intercept_date = $row['mb_intercept_date'] ? $row['mb_intercept_date'] : date("Ymd", G5_SERVER_TIME);

            $mb_nick = get_sideview($row['mb_id'], get_text($row['mb_nick']), $row['mb_email'], $row['mb_homepage']);

            $mb_id = $row['mb_id'];
        ?>
        <tr>
            <td class="td_mbid"><?php echo $mb_id ?></td>
            <td class="td_mbname"><?php echo get_text($row['mb_name']); ?></td>
            <td class="td_mbname sv_use"><div><?php echo $mb_nick ?></div></td>
            <td class="td_num"><?php echo $row['mb_level'] ?></td>
            <td><a href="./point_list.php?sfl=mb_id&amp;stx=<?php echo $row['mb_id'] ?>"><?php echo number_format($row['mb_point']) ?></a></td>
            <td class="td_boolean"><?php echo $row['mb_mailling']?'예':'아니오'; ?></td>
            <td class="td_boolean"><?php echo $row['mb_open']?'예':'아니오'; ?></td>
            <td class="td_boolean"><?php echo preg_match('/[1-9]/', $row['mb_email_certify'])?'예':'아니오'; ?></td>
            <td class="td_boolean"><?php echo $row['mb_intercept_date']?'예':'아니오'; ?></td>
            <td class="td_category"><?php echo $group ?></td>
        </tr>
        <?php
            }
        if ($i == 0)
            echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
        ?>
        </tbody>
        </table>
    </div>

    <div class="btn_list03 btn_list">
        <a href="./member_list.php">회원 전체보기</a>
    </div>

</section>

<?php
include_once ('./admin.tail.php');