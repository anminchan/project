<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$coin_skin_url.'/form_style.css">', 0);
?>

<div class="register">
	<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="url" value="<?php echo $urlencode ?>">
	<input type="hidden" name="agree" value="<?php echo $agree ?>">
	<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
	<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
	<input type="hidden" name="cert_no" value="">
	<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
	<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
	<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
	<?php }  ?>
	
	<div id="register_form" class="form_01">   
	    <div class="tbl_frm01 tbl_wrap register_form_inner">
	        <h2>코인구매정보</h2>
	        <ul>
	            <li>
	                <label for="cr_price"> (필수)구매금액</label>
	                <input type="text" id="cr_price" name="cr_price" value="" required class="frm_input required" readonly size="50" placeholder="금액을 선택하세요.">
                    <a href="#" class="price_01" onclick="fnPriceinput(10000);">1만원</a>
                    <a href="#" class="price_02" onclick="fnPriceinput(30000);">3만원</a>
                    <a href="#" class="price_03" onclick="fnPriceinput(50000);">5만원</a>
                    <a href="#" class="price_04" onclick="fnPriceinput(100000);">10만원</a>
                    <a href="#" class="price_05" onclick="fnPriceinput(500000);">50만원</a>
                    <a href="#" class="price_06" onclick="fnPriceinput(1000000);">100만원</a>
                    <a href="#" class="price_07" onclick="fnPriceinput(10000000);">1000만원</a>
                    <a href="#" class="price_08" onclick="fnPriceinput(0);">정정</a>

	            </li>
	            <li>
	                <label for="cr_coin"> (필수)최종지급수량</label>
                    <input type="text" id="cr_coin" name="cr_coin" value="" required class="frm_input required" readonly size="50" placeholder="자동계산"> COIN
	            </li>
                <li>
                    <label for="cr_paymethod"> 결제 수단</label>
                    <input type="text" id="cr_paymethod" name="cr_paymethod" value="현금" class="frm_input" readonly size="25">
                    <!--<select name="cr_paymethod" id="cr_paymethod">
                        <option value="">선택</option>
                        <option value="현금" selected>현금</option>
                    </select>-->
                </li>
	        </ul>
	    </div>
	
	    <div class="tbl_frm01 tbl_wrap register_form_inner">
	        <h2>입금정보</h2>
	        <ul>
                <li>
                    <label for="ac_name">은행명</label>
                    <input type="text" id="ac_name" name="ac_name" value="<?php echo $result_acc['ac_name'] ?>" class="frm_input" readonly size="25">
                </li>
                <li>
                    <label for="account">계좌번호</label>
                    <input type="text" id="account" name="account" value="<?php echo $result_acc['account'] ?>" class="frm_input" readonly size="25">
                </li>
                <li>
                    <label for="ac_holder">예금주</label>
                    <input type="text" id="ac_holder" name="ac_holder" value="<?php echo $result_acc['ac_holder'] ?>" class="frm_input" readonly size="25">
                </li>
                <li>
                    <label for="ac_memo">입금안내</label>
                    <textarea name="ac_memo" id="ac_memo" readonly><?php echo $result_acc['ac_memo'] ?></textarea>
                </li>
	        </ul>
	    </div>
	</div>
	<div class="btn_confirm">
	    <a href="<?php echo G5_URL ?>" class="btn_close">취소</a>
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
    // 회원아이디 검사
    if (f.w.value == "") {
        var msg = reg_mb_id_check();
        if (msg) {
            alert(msg);
            f.mb_id.select();
            return false;
        }
    }

    if (f.w.value == "") {
        if (f.mb_password.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password.focus();
            return false;
        }
    }

    if (f.mb_password.value != f.mb_password_re.value) {
        alert("비밀번호가 같지 않습니다.");
        f.mb_password_re.focus();
        return false;
    }

    if (f.mb_password.value.length > 0) {
        if (f.mb_password_re.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password_re.focus();
            return false;
        }
    }

    // 이름 검사
    if (f.w.value=="") {
        if (f.mb_name.value.length < 1) {
            alert("이름을 입력하십시오.");
            f.mb_name.focus();
            return false;
        }

        /*
        var pattern = /([^가-힣\x20])/i;
        if (pattern.test(f.mb_name.value)) {
            alert("이름은 한글로 입력하십시오.");
            f.mb_name.select();
            return false;
        }
        */
    }

    <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
    // 본인확인 체크
    if(f.cert_no.value=="") {
        alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
        return false;
    }
    <?php } ?>

    // 닉네임 검사
    if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
        var msg = reg_mb_nick_check();
        if (msg) {
            alert(msg);
            f.reg_mb_nick.select();
            return false;
        }
    }

    // E-mail 검사
    if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
        var msg = reg_mb_email_check();
        if (msg) {
            alert(msg);
            f.reg_mb_email.select();
            return false;
        }
    }

    <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
    // 휴대폰번호 체크
    var msg = reg_mb_hp_check();
    if (msg) {
        alert(msg);
        f.reg_mb_hp.select();
        return false;
    }
    <?php } ?>

    if (typeof f.mb_icon != "undefined") {
        if (f.mb_icon.value) {
            if (!f.mb_icon.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
                alert("회원아이콘이 이미지 파일이 아닙니다.");
                f.mb_icon.focus();
                return false;
            }
        }
    }

    if (typeof f.mb_img != "undefined") {
        if (f.mb_img.value) {
            if (!f.mb_img.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
                alert("회원이미지가 이미지 파일이 아닙니다.");
                f.mb_img.focus();
                return false;
            }
        }
    }

    if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
        if (f.mb_id.value == f.mb_recommend.value) {
            alert("본인을 추천할 수 없습니다.");
            f.mb_recommend.focus();
            return false;
        }

        var msg = reg_mb_recommend_check();
        if (msg) {
            alert(msg);
            f.mb_recommend.select();
            return false;
        }
    }

    <?php echo chk_captcha_js();  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

// 금액계산
function fnPriceinput(price){
    var sum = '';
    if(price > 0){
        sum = Number($("#cr_price").val().replaceAll(",", ""))+price;
    }
    $("#cr_price").val(sum.toLocaleString());
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