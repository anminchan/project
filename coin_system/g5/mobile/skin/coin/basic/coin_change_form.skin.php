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
    <input type="hidden" name="mb_coin" value="<?php echo $result['mb_coin'] ?>">

    <div class="form_01">
        <h2>코인전환정보</h2>
        <ul>
            <li>
                <label> 보유코인</label>
                <p style="color: red;"><b><?php echo number_format($result['mb_coin']); ?> COIN</b></p>
            </li>
            <li>
                <label for="cr_price"> (필수)전환코인</label>
                <input type="text" id="cr_coin" name="cr_coin" value="" required class="frm_input required" readonly size="50" placeholder="전환할 코인을 입력하세요.">
                <ul style="margin-top: 5px">
                    <li>
                        <a href="javascript:;" class="price_01" onclick="fnCoininput(1);">1Coin</a>
                        <a href="javascript:;" class="price_02" onclick="fnCoininput(3);">3Coin</a>
                        <a href="javascript:;" class="price_03" onclick="fnCoininput(5);">5Coin</a>
                        <a href="javascript:;" class="price_04" onclick="fnCoininput(10);">10Coin</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="price_06" onclick="fnCoininput(20);">20Coin</a>
                        <a href="javascript:;" class="price_07" onclick="fnCoininput(50);">50Coin</a>
                        <a href="javascript:;" class="price_08" onclick="fnCoininput(100);">100Coin</a>
                        <a href="javascript:;" class="price_09" onclick="fnCoininput(0);">정정</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="btn_confirm">
	    <a href="<?php echo G5_URL ?>" class="btn_cancel">취소</a>
	    <button type="submit" id="btn_submit" class="btn_submit" accesskey="s">전환신청</button>
	</div>
    </form>
</div>
<script>
$(function() {


});

// submit 최종 폼체크
function fregisterform_submit(f)
{
    if (f.cr_coin.value == "") {
        alert("전환할 코인을 확인 바랍니다.");
        f.cr_coin.focus();
        return false;
    }

    //console.log(f.cr_coin.value);
    //console.log(f.mb_coin.value);
    if (Number(f.cr_coin.value) > Number(f.mb_coin.value)) {
        alert("보유코인보다 많은 코인을 전환 할 수 없습니다.");
        return false;
    }

    if(!confirm("코인을 전환하시겠습니까?"))
        return false;
    
    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

// 금액계산
function fnCoininput(coin){
    var coint_sum = '';
    if(coin > 0 || coin < 0){
        coint_sum = Number($("#cr_coin").val().replace(/,/g, ""))+coin;
    }
    if(coint_sum <= 0){
        coint_sum = '';
    }

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