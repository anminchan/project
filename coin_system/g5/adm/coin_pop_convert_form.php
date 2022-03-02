<?php
$sub_menu = '300910';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

$html_title = '코인변환';

$g5['title'] = $html_title;
include_once(G5_PATH.'/head.sub.php');

?>
    <div class="new_win">
        <h1>코인변환</h1>
        <form name="fcoinform" action="./coin_pop_convert_formupdate.php" method="post" onsubmit="return form_check(this);" autocomplete="off">
            <input type="hidden" name="mb_id" value="<?php echo $mb_id; ?>">

            <div class="tbl_head01 tbl_wrap new_win_con">
                <table>
                    <caption><?php echo $g5['title']; ?></caption>
                    <colgroup>
                        <col class="grid_2">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th scope="row"><label for="cp_subject">상태</label></th>
                        <td>
                            <select name="cr_state" id="cr_state" required>
                                <option value="">선택</option>
                                <option value="3">증가</option>
                                <option value="4">차감</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cp_subject">변경수량</label></th>
                        <td>
                            <input type="text" name="cr_coin" value="" id="cr_coin" required class="required frm_input">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="cp_subject">사유</label></th>
                        <td>
                            <input type="text" name="cr_memo" value="" id="cr_memo" class="frm_input">
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