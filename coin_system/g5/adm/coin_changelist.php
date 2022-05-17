<?php
$sub_menu = '300980';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$g5['title'] = '코인 전환관리';
include_once (G5_ADMIN_PATH.'/admin.head.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

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
}else{
    $where[] = " cr_state in (5,6,7) ";
}

if ($fr_date && $to_date) {
    $where[] = " cr_date between '$fr_date 00:00:00' and '$to_date 23:59:59' ";
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
//$sql_common = "  from {$g5['coin_req_table']} ";
$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

//$rows = $config['cf_page_rows'];
$rows = ($page_rows) ? $page_rows : $config['cf_page_rows'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql  = " select *
          $sql_common
          order by $sst $sod
          limit $from_record, $rows ";
//echo $sql;
$result = sql_query($sql);

$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca.'&amp;save_stx='.$stx.'&amp;cr_state='.$cr_state.'&amp;fr_date='.$fr_date.'&amp;to_date='.$to_date.'&amp;page_rows='.$page_rows;

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';
?>

<div class="admin_pg_notice od_test_caution">(주의!) 당일 신청 내역만 승인 가능합니다. 당일 승인하지 못한 건들은 취소처리됩니다.</div>

<div class="local_ov01 local_ov">
    <?php echo $listall; ?>
    <span class="btn_ov01"><span class="ov_txt"> 전체 문의내역</span><span class="ov_num"> <?php echo $total_count; ?>건</span></span>

    <select id="page_rows" onchange="location='<?php echo "{$_SERVER['SCRIPT_NAME']}?{$qstr}&page=1";?>&page_rows='+this.value;">
        <?php echo option_selected('30',  $page_rows, '30줄 정렬'); ?>
        <?php echo option_selected('50',  $page_rows, '50줄 정렬'); ?>
        <?php echo option_selected('100', $page_rows, '100줄 정렬'); ?>
        <?php echo option_selected('150', $page_rows, '150줄 정렬'); ?>
    </select>
</div>

<form class="local_sch03 local_sch">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="hidden" name="page_rows" value="<?php echo $page_rows; ?>">
    <input type="hidden" name="save_stx" value="<?php echo $stx; ?>">

    <div>
        <strong>일자</strong>
        <?php echo $fr_date; ?> ~ <?php echo $to_date; ?>
        <!--<input type="text" id="fr_date"  name="fr_date" value="<?php /*echo $fr_date; */?>" readonly class="frm_input" size="10" maxlength="10"> ~
        <input type="text" id="to_date"  name="to_date" value="<?php /*echo $to_date; */?>" readonly class="frm_input" size="10" maxlength="10">
        <button type="button" onclick="javascript:set_date('오늘');">오늘</button>
        <button type="button" onclick="javascript:set_date('어제');">어제</button>
        <button type="button" onclick="javascript:set_date('이번주');">이번주</button>
        <button type="button" onclick="javascript:set_date('이번달');">이번달</button>
        <button type="button" onclick="javascript:set_date('지난주');">지난주</button>
        <button type="button" onclick="javascript:set_date('지난달');">지난달</button>
        <button type="button" onclick="javascript:set_date('전체');">전체</button>-->
    </div>

    <div>
        <strong>신청상태</strong>
        <input type="radio" name="cr_state" value="" id="cr_state_all" <?php echo get_checked($cr_state, ''); ?>>
        <label for="cr_state_all">전체</label>
        <input type="radio" name="cr_state" value="0" id="cr_state_req" <?php echo get_checked($cr_state, '6'); ?>>
        <label for="cr_state_req">전환요청</label>
        <input type="radio" name="cr_state" value="1" id="cr_state_app" <?php echo get_checked($cr_state, '5'); ?>>
        <label for="cr_state_app">전환완료</label>
        <input type="radio" name="cr_state" value="2" id="cr_state_hold" <?php echo get_checked($cr_state, '7'); ?>>
        <label for="cr_state_hold">전환취소</label>
    </div>

    <div class="sch_last">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl">
            <option value="mb_id" <?php echo get_selected($sfl, 'mb_id'); ?>>아이디</option>
            <option value="mb_name" <?php echo get_selected($sfl, 'mb_name'); ?>>이름</option>
            <option value="cr_price" <?php echo get_selected($sfl, 'cr_coin'); ?>>금액</option>
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo $stx; ?>" id="stx" class="frm_input">
        <input type="submit" value="검색" class="btn_submit">
    </div>
</form>

<form name="fcoin_reqlist" method="post" action="./coin_changelistupdate.php" onsubmit="return fcoin_reqlist_submit(this);" autocomplete="off">
<input type="hidden" name="sca" value="<?php echo $sca; ?>">
<input type="hidden" name="sst" value="<?php echo $sst; ?>">
<input type="hidden" name="sod" value="<?php echo $sod; ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="q1" value="<?php echo $qstr; ?>">

<div class="tbl_head01 tbl_wrap" id="coin_reqlist">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">
            <label for="chkall" class="sound_only">상품문의 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">번호</th>
        <th scope="col"><?php echo subject_sort_link('mb_id'); ?>아이디</a></th>
        <th scope="col">이름</th>
        <th scope="col">전환코인</th>
        <th scope="col">상태</th>
        <th scope="col">요청일자</th>
        <th scope="col">관리</th>
        <th scope="col">처리일자</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $name = get_sideview($row['mb_id'], get_text($row['mb_name']), '', '');
        $bg = 'bg'.($i%2);

        switch($row['cr_state']) {
            case 5:
                $str = "<span class=\"status_01 color_05\">".$gw_status[$row['cr_state']]."</span>";
                break;
            case 7:
                $str = "<span class=\"status_01 color_06\">".$gw_status[$row['cr_state']]."</span>";
                break;
            default :
                $str = "<span class=\"status_01 color_01\">".$gw_status[$row['cr_state']]."</span>";
                break;
        }

        $coinValue = '';
        if($row['cr_state'] == '6')
            $coinValue = '<span>(보유코인 : '.number_format($row['mb_coin']).' Coin)</span>';

    ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_chk">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['mb_id']) ?></label>
            <?php if($row['cr_state']=='6'){ ?>
                <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i; ?>">
            <?php } ?>
            <input type="hidden" name="cr_id[<?php echo $i; ?>]" value="<?php echo $row['cr_id']; ?>">
        </td>
        <td class="td_num"><?php echo $total_count--; ?></td>
        <td class="td_id"><?php echo $row['mb_id']; ?></td>
        <!--<td class="td_name"><?php /*echo $row['mb_name']; */?></td>-->
        <td class="td_name2"><?php echo $name; ?> <?php echo $coinValue;?></td>
        <td class="td_price"><?php echo number_format($row['cr_coin']); ?></td>
        <td class="td_stat"><?php echo $str; ?></td>
        <td class="td_datetime"><?php echo $row['cr_date']; ?></td>
        <td class="td_mng">
            <?php if($row['cr_state']=='6'){ ?>
                <a href="javascript:fnstateupdate('<?php echo $row['cr_id']; ?>', '5');" class="btn btn_01">승인</a>
                <a href="javascript:fnstateupdate('<?php echo $row['cr_id']; ?>', '7');" class="btn btn_03">취소</a>
            <?php } ?>
        </td>
        <td class="td_datetime"><?php echo $row['cr_uptime']; ?></td>
    </tr>
    <?php
    }
    if ($i == 0) {
        echo '<tr><td colspan="9" class="empty_table"><span>자료가 없습니다.</span></td></tr>';
    }
    ?>
    </tbody>
    </table>
</div>

<div class="btn_fixed_top">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
    <input type="submit" name="act_button" value="일괄승인" onclick="document.pressed=this.value" class="btn btn_01">
    <input type="submit" name="act_button" value="일괄취소" onclick="document.pressed=this.value" class="btn btn_03">
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

    if(document.pressed  == "일괄승인") {
        if(!confirm("선택한 자료를 전환승인 하시겠습니까?")) {
            return false;
        }
    }

    if(document.pressed  == "일괄취소") {
        if(!confirm("선택한 자료를 전환취소 하시겠습니까?")) {
            return false;
        }
    }

    return true;
}

function fnstateupdate(cr_id, cr_state){
    if (!confirm("전환 승인/취소 하시겠습니까?"))
        return false;
    
    var f = document.createElement('form');
    var input = document.createElement('input');
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "cr_id");
    input.setAttribute("value", cr_id);
    f.appendChild(input);
    input = document.createElement('input');
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "cr_state");
    input.setAttribute("value", cr_state);
    f.appendChild(input);

    document.body.appendChild(f);
    f.charset = 'UTF-8';
    f.method = 'post';
    f.action = './coin_stateupdate2.php';

    f.submit();
}

$(function(){
    //$("#fr_date, #to_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" });

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