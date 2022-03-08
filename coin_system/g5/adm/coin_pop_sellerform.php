<?php
include_once('./_common.php');

$html_title = '판매자 리스트';

$g5['title'] = $html_title;
include_once(G5_PATH.'/head.sub.php');

$ac_id = $_GET['ac_id'];
$sql = " select * from {$g5['account_table']} where ac_id = '$ac_id' ";
$result = sql_fetch($sql);
?>
    <div class="new_win">
        <h1>코인변환</h1>
        <form name="fcoinform" action="./coin_pop_convert_formupdate.php" method="post" onsubmit="return form_check(this);" autocomplete="off">
            <input type="hidden" name="ac_id" value="<?php echo $ac_id; ?>">

            <div class="tbl_frm01 tbl_wrap new_win_con">
                <table>
                    <caption><?php echo $g5['title']; ?></caption>
                    <colgroup>
                        <col class="grid_4">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="cp_subject">아이디</label></th>
                        <td><?php echo $result['mb_id'];?></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cp_subject">계좌정보</label></th>
                        <td><?php echo $result['ac_name'].' '.$result['ac_holder'].' '.$result['account'];?></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cp_subject">코인주소</label></th>
                        <td><?php echo $result['mb_wallet_addr'];?></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cp_subject">코인잔액</label></th>
                        <td><?php echo $result['mb_coin'];?></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cp_subject">코인충전</label></th>
                        <td>
                            <input type="text" name="mb_coin" value="" id="mb_coin" class="frm_input" size="20">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="btn_confirm01 btn_confirm win_btn">
                <button type="button" onclick="window.close();" class="btn_close btn">닫기</button>
                <input type="submit" value="확인" class="btn_submit btn" accesskey="s">
            </div>
        </form>
    </div>

    <script>
        function form_check(f)
        {
            var cr_state = f.cr_state;
            cr_state = cr_state.options[cr_state.selectedIndex].value;
            var cr_coin = f.cr_coin.value;

            if(!f.cr_state.checked && f.cr_state.value == "") {
                alert("상태를 선택해 주십시오.");
                return false;
            }

            if(isNaN(cr_coin)) {
                alert("변경수량은 숫자로 입력해 주십시오.");
                f.cr_coin.focus();
                return false;
            }

            if(!confirm("변환하시겠습니까?")) {
                return false;
            }

            return true;
        }
    </script>
<?php
include_once(G5_PATH.'/tail.sub.php');