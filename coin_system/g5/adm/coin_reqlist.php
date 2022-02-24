<?php
$sub_menu = '300910';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$g5['title'] = '신청현황';
include_once (G5_ADMIN_PATH.'/admin.head.php');

$cr_state = isset($_GET['cr_state']) ? get_search_string($_GET['cr_state']) : '';

$where = array();

$fr_date = (isset($_GET['fr_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['fr_date'])) ? $_GET['fr_date'] : '';
$to_date = (isset($_GET['to_date']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_GET['to_date'])) ? $_GET['to_date'] : '';

// 기본날짜 조건 당일로 지정
if(!isset($_GET['fr_date']) && !$fr_date)
    $fr_date = G5_TIME_YMD;

// 기본날짜 조건 당일로 지정
if(!isset($_GET['to_date']) && !$to_date)
    $to_date = G5_TIME_YMD;

$sql_search = "";

if ($stx != "") {
    if ($sfl != "") {
        $where[] = " $sfl like '%$stx%' ";
    }

    if ($save_stx != $stx) {
        $page = 1;
    }
}

if ($sca != "") {
    $where[] = " ca_id like '$sca%' ";
}

if ($cr_state != "") {
    $where[] = " cr_state = '$cr_state' ";
}

if ($fr_date && $to_date) {
    $where[] = " cr_time between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
}

if ($where) {
    $sql_search = ' where '.implode(' and ', $where);
}

if ($sfl == "")  $sfl = "mb_id";
if (!$sst) {
    $sst = "cr_id";
    $sod = "desc";
}

$sql_common = "  from {$g5['coin_req_table']} a
                 left join {$g5['member_table']} b on (a.mb_id = b.mb_id) ";
$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql  = " select *
          $sql_common
          order by $sst $sod
          limit $from_record, $rows ";
$result = sql_query($sql);

//$qstr = 'page='.$page.'&amp;sst='.$sst.'&amp;sod='.$sod.'&amp;stx='.$stx;
$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca.'&amp;save_stx='.$stx;

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';
?>

<div class="local_ov01 local_ov">
    <?php echo $listall; ?>
    <span class="btn_ov01"><span class="ov_txt"> 전체 문의내역</span><span class="ov_num"> <?php echo $total_count; ?>건</span></span>
</div>

<form name="flist" class="local_sch01 local_sch">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="save_stx" value="<?php echo $stx; ?>">

<label for="sca" class="sound_only">분류선택</label>
<select name="sca" id="sca">
    <option value="">전체분류</option>
    <?php
    $sql1 = " select ca_id, ca_name from {$g5['g5_shop_category_table']} order by ca_order, ca_id ";
    $result1 = sql_query($sql1);
    for ($i=0; $row1=sql_fetch_array($result1); $i++) {
        $len = strlen($row1['ca_id']) / 2 - 1;
        $nbsp = "";
        for ($i=0; $i<$len; $i++) $nbsp .= "&nbsp;&nbsp;&nbsp;";
        $selected = ($row1['ca_id'] == $sca) ? ' selected="selected"' : '';
        echo '<option value="'.$row1['ca_id'].'"'.$selected.'>'.$nbsp.$row1['ca_name'].'</option>'.PHP_EOL;
    }
    ?>
</select>

<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mb_id" <?php echo get_selected($sfl, 'mb_id'); ?>>아이디</option>
    <option value="mb_id" <?php echo get_selected($sfl, 'mb_id'); ?>>이름</option>
    <option value="mb_id" <?php echo get_selected($sfl, 'mb_id'); ?>>금액</option>
</select>

<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx; ?>" id="stx" required class="frm_input required">
<input type="submit" value="검색" class="btn_submit">
</form>

<form class="local_sch03 local_sch">
    <div>
        <strong>신청상태</strong>
        <input type="radio" name="cr_state" value="" id="cr_state_all" <?php echo get_checked($cr_state, '');     ?>>
        <label for="cr_state_all">전체</label>
        <input type="radio" name="cr_state" value="0" id="cr_state_req" <?php echo get_checked($cr_state, '0'); ?>>
        <label for="cr_state_req">입금요청</label>
        <input type="radio" name="cr_state" value="1" id="cr_state_app" <?php echo get_checked($cr_state, '1'); ?>>
        <label for="cr_state_app">입금완료</label>
        <input type="radio" name="cr_state" value="2" id="cr_state_hold" <?php echo get_checked($cr_state, '2'); ?>>
        <label for="cr_state_hold">입금취소</label>
    </div>

    <div class="sch_last">
        <strong>주문일자</strong>
        <input type="text" id="fr_date"  name="fr_date" value="<?php echo $fr_date; ?>" class="frm_input" size="10" maxlength="10"> ~
        <input type="text" id="to_date"  name="to_date" value="<?php echo $to_date; ?>" class="frm_input" size="10" maxlength="10">
        <button type="button" onclick="javascript:set_date('오늘');">오늘</button>
        <button type="button" onclick="javascript:set_date('어제');">어제</button>
        <button type="button" onclick="javascript:set_date('이번주');">이번주</button>
        <button type="button" onclick="javascript:set_date('이번달');">이번달</button>
        <button type="button" onclick="javascript:set_date('지난주');">지난주</button>
        <button type="button" onclick="javascript:set_date('지난달');">지난달</button>
        <button type="button" onclick="javascript:set_date('전체');">전체</button>
        <input type="submit" value="검색" class="btn_submit">
    </div>
</form>

<form name="fcoin_reqlist" method="post" action="./coin_reqlistupdate.php" onsubmit="return fcoin_reqlist_submit(this);" autocomplete="off">
<input type="hidden" name="sca" value="<?php echo $sca; ?>">
<input type="hidden" name="sst" value="<?php echo $sst; ?>">
<input type="hidden" name="sod" value="<?php echo $sod; ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="search_od_status" value="<?php echo $od_status; ?>">

<div class="tbl_head01 tbl_wrap" id="coin_reqlist">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <colgroup>
        <col style="width:50px">
        <col style="width:50px">
        <col class="grid_2">
        <col class="grid_2">
        <col class="grid_2">
        <col class="grid_2">
        <col>
        <col class="grid_2">
        <col class="grid_2">
        <col class="grid_2">
        <col class="grid_2">
    </colgroup>
    <thead>
    <tr>
        <th scope="col">
            <label for="chkall" class="sound_only">상품문의 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">번호</th>
        <th scope="col"><?php echo subject_sort_link('it_name'); ?>아이디</a></th>
        <th scope="col">이름</a></th>
        <th scope="col">구매금액</a></th>
        <th scope="col">지급코인</a></th>
        <th scope="col">입금자정보</a></th>
        <th scope="col">상태</a></th>
        <th scope="col">요청일자</a></th>
        <th scope="col">관리</th>
        <th scope="col">처리일자</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $name = get_sideview($row['mb_id'], get_text($row['mb_name']), $row['mb_email'], $row['mb_homepage']);
        $bg = 'bg'.($i%2);

        switch($row['cr_state']) {
            case 1:
                $str = "<span class=\"\" style=\"background: #b6ca5b;color: white; cursor:default;\">입금완료</span>";
                break;
            case 2:
                $str = "<span class=\"\" style=\"background: #ca5b7c;color: white; cursor:default;\">입금취소</span>";
                break;
            case 3:
                $str = "<span class=\"\" style=\"background: #8dbed1;color: white; cursor:default;\">증감</span>";
                break;
            case 4:
                $str = "<span class=\"\" style=\"background: #5bc6ca;color: white; cursor:default;\">차감</span>";
                break;
            case 5:
                $str = "<span class=\"\" style=\"background: #5b76ca;color: white; cursor:default;\">전환</span>";
                break;
            default :
                $str = "<span class=\"\" style=\"background: #5b76ca;color: white; cursor:default;\">입금요청</span>";
                break;
        }

     ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_chk">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['mb_id']) ?></label>
            <?php if(!$row['cr_state']){ ?>
                <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i; ?>">
            <?php } ?>
            <input type="hidden" name="cr_id[<?php echo $i; ?>]" value="<?php echo $row['cr_id']; ?>">
        </td>
        <td class="td_name"><?php echo $total_count--; ?></td>
        <td class="td_name"><?php echo $row['mb_id']; ?></td>
        <td class="td_name"><?php echo $name; ?></td>
        <td class="td_boolean"><?php echo number_format($row['cr_price']); ?></td>
        <td class="td_boolean"><?php echo number_format($row['cr_coin']); ?></td>
        <td class="td_boolean"><?php echo $row['mb_bank'].'/'.$row['mb_bank_account'].'/'.$row['mb_bank_holder']; ?></td>
        <td class="td_mng td_mng_s"><?php echo $str; ?></td>
        <td><?php echo $row['cr_time']; ?></td>
        <td>
            <input type="submit" name="act_button" value="승인" onclick="document.pressed=this.value" class="btn btn_01">
            <input type="submit" name="act_button" value="취소" onclick="document.pressed=this.value" class="btn btn_03">
        </td>
        <td><?php echo $row['cr_uptime']; ?></td>
    </tr>
    <?php
    }
    if ($i == 0) {
        echo '<tr><td colspan="11" class="empty_table"><span>자료가 없습니다.</span></td></tr>';
    }
    ?>
    </tbody>
    </table>
</div>

<div class="btn_fixed_top">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
    <input type="submit" name="act_button" value="승인" onclick="document.pressed=this.value" class="btn btn_01">
    <input type="submit" name="act_button" value="취소" onclick="document.pressed=this.value" class="btn btn_03">
</div>
</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<script>
function fcoin_reqlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed  == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}

$(function(){
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
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');