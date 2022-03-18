<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$coin_skin_url.'/form_style.css">', 0);
?>

<div class="register">
	<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="mb_bank_nm" value="<?php echo $member['mb_bank_nm'] ?>">
    <input type="hidden" name="mb_bank_account" value="<?php echo $member['mb_bank_account'] ?>">
    <input type="hidden" name="mb_bank_holder" value="<?php echo $member['mb_bank_holder'] ?>">
    <input type="hidden" name="mb_name" value="<?php echo $member['mb_name'] ?>">

    <div class="form_01">
        <h2>코인구매정보</h2>
        <ul>
            <li>
                <label for="cr_price" class="sound_only"> (필수)구매금액</label>
                <input type="text" id="cr_price" name="cr_price" value="" required class="frm_input required" readonly size="25" placeholder="(필수)구매금액">
                <ul style="margin-top: 5px">
                    <li>
                        <a href="#" class="price_01" onclick="fnPriceinput(10000);">1만원</a>
                        <a href="#" class="price_02" onclick="fnPriceinput(30000);">3만원</a>
                        <a href="#" class="price_03" onclick="fnPriceinput(50000);">5만원</a>
                        <a href="#" class="price_04" onclick="fnPriceinput(100000);">10만원</a>
                    </li>
                    <li>
                        <!--<a href="#" class="price_05" onclick="fnPriceinput(150000);">15만원</a>-->
                        <a href="#" class="price_06" onclick="fnPriceinput(200000);">20만원</a>
                        <a href="#" class="price_07" onclick="fnPriceinput(500000);">50만원</a>
                        <a href="#" class="price_08" onclick="fnPriceinput(1000000);">100만원</a>
                        <a href="#" class="price_09" onclick="fnPriceinput(0);">정정</a>
                    </li>
                </ul>
                <!--<a href="#" class="price_07" onclick="fnPriceinput(10000000);">1000만원</a>
                <a href="#" class="price_08" onclick="fnPriceinput(-10000);">1만원차감</a>
                <a href="#" class="price_08" onclick="fnPriceinput(-100000);">10만원차감</a>
                <a href="#" class="price_06" onclick="fnPriceinput(-1000000);">100만원차감</a>-->
            </li>
            <li>
                <label for="cr_coin" class="sound_only"> (필수)최종지급수량</label>
                <input type="text" id="cr_coin" name="cr_coin" value="" required class="frm_input required" readonly size="20" placeholder="(필수)최종지급수량"> COIN
            </li>
            <li>
                <label for="cr_paymethod" class="sound_only"> 결제 수단</label>
                <input type="text" id="cr_paymethod" name="cr_paymethod" value="현금" class="frm_input" readonly size="25">
                <!--<select name="cr_paymethod" id="cr_paymethod">
                    <option value="">선택</option>
                    <option value="현금" selected>현금</option>
                </select>-->
            </li>
        </ul>
    </div>
    <div class="form_01">
        <h2>입금정보</h2>
        <ul>
            <li>
                <span class="frm_label">은행명</span>
                <input type="text" id="ac_name" name="ac_name" value="<?php echo $result_acc['ac_name'] ?>" class="frm_input" readonly size="25">
            </li>
            <li>
                <span class="frm_label">계좌번호</span>
                <input type="text" id="account" name="account" value="<?php echo $result_acc['account'] ?>" class="frm_input" readonly size="25">
            </li>
            <li>
                <span class="frm_label">예금주</span>
                <input type="text" id="ac_holder" name="ac_holder" value="<?php echo $result_acc['ac_holder'] ?>" class="frm_input" readonly size="25">
            </li>
            <li>
                <span class="frm_label">입금안내</span>
                <textarea name="ac_memo" id="ac_memo" readonly><?php echo $result_acc['ac_memo'] ?></textarea>
            </li>
        </ul>
    </div>

    <div class="btn_confirm">
	    <a href="<?php echo G5_URL ?>" class="btn_cancel">취소</a>
	    <button type="submit" id="btn_submit" class="btn_submit" accesskey="s">코인구매</button>
	</div>
    </form>
</div>
<script>
$(function() {


});

// submit 최종 폼체크
function fregisterform_submit(f)
{
    if (f.cr_price.value == "") {
        alert("구매금액을 확인 바랍니다.");
        f.cr_price.focus();
        return false;
    }

    if (f.cr_coin.value == "") {
        alert("구매코인을 확인 바랍니다.");
        f.cr_coin.focus();
        return false;
    }

    if(!confirm("코인을 구매하시겠습니까?"))
        return false;
    
    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

// 금액계산
function fnPriceinput(price){
    var price_sum = coint_sum = '';
    if(price > 0 || price < 0){
        price_sum = Number($("#cr_price").val().replace(/,/g, ""))+price;
        coint_sum = price_sum/10000;
    }
    if(price_sum <= 0 && coint_sum <= 0){
        price_sum = coint_sum = '';
    }
    $("#cr_price").val(price_sum.toLocaleString());
    $("#cr_coin").val(coint_sum.toLocaleString());
}

jQuery(function($){
	//tooltip
    $(document).on("click", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeIn(400).css("display","inline-block");
    }).on("mouseout", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeOut();
    });
});

</script>

<!-- } 회원정보 입력/수정 끝 -->