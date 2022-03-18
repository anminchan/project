<?php
include_once('./_common.php');

echo "::".$_SERVER['HTTP_USER_AGENT']."::";

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>사용자테스트</title>
<link rel="stylesheet" href="http://127.0.0.1/theme/basic/css/default.css">
<link rel="stylesheet" href="http://127.0.0.1/js/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="http://127.0.0.1/theme/basic/skin/outlogin/basic/style.css">
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
    var g5_url       = "<?php echo G5_URL ?>";
    var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
    var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
    var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
    var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
    var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
    var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
    var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
</script>
<script src="<?php echo G5_JS_URL ?>/jquery-1.12.4.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery-migrate-1.4.1.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.menu.js"></script>
<script src="<?php echo G5_JS_URL ?>/common.js"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js"></script>
<script src="<?php echo G5_JS_URL ?>/placeholders.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.bxslider.js"></script>
</head>
<body>

<h2>사용자테스트</h2>
<div id="wrapper">
<div id="container_wr">
<div id="container">
<div class="register">
<div id="register_form" class="form_01">
    <div class="tbl_frm01 tbl_wrap register_form_inner">
        <form name="userform" id="userform">
        <input type="hidden" id="refresh_token" name="refresh_token" value="<?php echo $config['cf_2'] ?>" readonly class="frm_input">

        <h2>토큰</h2>
        <ul>
            <li>
                <label>AccessToken발행</label>
                <input type="text" id="access_token" name="access_token" value="<?php echo $config['cf_3'] ?>" size="100" class="frm_input">
                <textarea id="access_result"></textarea>
                <button type="button" onclick="fnMove('ac');" style="width: 55px;height: 27px;">발행</button>
            </li>
        </ul>

        <h2>회원가입</h2>
        <ul>
            <li>
                <label>아이디</label>
                <input type="text" id="user_id" name="user_id" value="" class="frm_input">
            </li>
            <li>
                <label>패스워드</label>
                <input type="password" id="user_password" name="user_password" value="" class="frm_input">
                <button type="button" onclick="fnMove('mc');" style="width: 55px;height: 27px;">등록</button>
            </li>
            <li>
                <label>결과</label>
                <textarea id="add_result"></textarea>
            </li>
            <li>
                <label>사용할 아이디</label>
                <input type="text" id="mb_id" name="mb_id" value="" class="frm_input">
            </li>
        </ul>
        
        <h2>회원정보</h2>
        <ul>
            <li>
                <label>상세조회</label>
                <textarea id="view_result"></textarea>
                <button type="button" onclick="fnMove('mv');" style="width: 55px;height: 27px;">이동</button>
            </li>
            <li>
                <label>목록조회</label>
                <textarea id="list_result"></textarea>
                <button type="button" onclick="fnMove('ml');" style="width: 55px;height: 27px;">조회</button>
            </li>
            <li>
                <label>삭제결과</label>
                <textarea id="del_result"></textarea>
                <button type="button" onclick="fnMove('md');" style="width: 55px;height: 27px;">삭제</button>
            </li>
        </ul>

        <h2>코인 조회/전환</h2>
        <ul>
            <li>
                <label>사용자코인주소</label>
                <input type="text" id="mb_wallet_addr" name="mb_wallet_addr" value="" class="frm_input">
                <input type="text" id="mb_coin" name="mb_coin" value="" readonly class="frm_input"> Coin
                <button type="button" onclick="fnMove('cv');" style="width: 55px;height: 27px;">조회</button>
                <textarea id="wallet_result"></textarea>
            </li>

            <li>
                <label for="cr_price">전환</label>
                <input type="text" id="cr_coin" name="cr_coin" value="" class="frm_input" size="50">
                <button type="button" onclick="fnMove('cb');" style="width: 55px;height: 27px;">신청</button>
                <textarea id="balance_result"></textarea>
            </li>

            <li>
                <label>회원 코인보유 리스트</label>
                <button type="button" onclick="fnMove('cl');" style="width: 55px;height: 27px;">조회</button>
                <textarea id="membercoin_result"></textarea>
            </li>
        </ul>

        <h2>코인구매</h2>
        <ul>
            <li>
                <label for="cr_price">거래소이동</label>
                <button type="button" onclick="window.open('<?php echo G5_URL ?>')" style="width: 55px;height: 27px;">이동</button>
            </li>
        </ul>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    
    function fnMove(gubun){
        if(gubun!='ac' && $("#access_token").val() == ''){
            alert("access_token을 발행받으시기 바랍니다.");
            $("#access_token").focus();
            return false;
        }

        if(gubun=='mc'){
            if($("#user_id").val() == ''){
                alert("아이디를 입력 바랍니다.");
                $("#id").focus();
                return false;
            }
            if($("#user_password").val() == ''){
                alert("패스워드를 입력 바랍니다.");
                $("#password").focus();
                return false;
            }
        }

        if((gubun=='md' || gubun=='mv' || gubun=='cb') && $("#mb_id").val() == ''){
            alert("사용할 아이디를 입력 바랍니다.");
            $("#mb_id").focus();
            return false;
        }

        if(gubun=='cv' && $("#mb_wallet_addr").val() == ''){
            alert("사용자코인주소가 없습니다.");
            $("#mb_wallet_addr").focus();
            return false;
        }

        if(gubun=='cb' && $("#cr_coin").val() == ''){
            alert("전환 코인을 입력 바랍니다.");
            $("#cr_coin").focus();
            return false;
        }

        //console.log($("#refresh_token").val());
        //console.log($("#access_token").val());
        console.log($("#mb_id").val());
        console.log($("#mb_wallet_addr").val());

        $.ajax({
            url: g5_url+'/ajax.userTest.php',
            type: "POST",
            data: {
                "refresh_token": $("#refresh_token").val(),
                "access_token": $("#access_token").val(),
                "user_id": $("#user_id").val(),
                "user_password": $("#user_password").val(),
                "mb_id": $("#mb_id").val(),
                "mb_wallet_addr": $("#mb_wallet_addr").val(),
                "cr_coin": $("#cr_coin").val(),
                "gubun": gubun
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                console.log(data.success);
                console.log(data.code);
                console.log(data.message);
                console.log(data.error);
                console.log(JSON.stringify(data.data));

                switch (gubun){
                    case "ac" :
                        $("#access_token").val(data.data.access_token);
                        $("#access_result").text('');
                        $("#access_result").text(JSON.stringify(data));
                        break;
                    case "mc" :
                        $("#add_result").text('');
                        $("#add_result").text(JSON.stringify(data));
                        break;
                    case "mv" :
                        $("#view_result").text('');
                        $("#view_result").text(JSON.stringify(data));
                        break;
                    case "md" :
                        $("#del_result").text('');
                        $("#del_result").text(JSON.stringify(data));
                        break;
                    case "ml" :
                        $("#list_result").text('');
                        $("#list_result").text(JSON.stringify(data));
                        break;
                    case "cv" :
                        $("#wallet_result").text('');
                        $("#wallet_result").text(JSON.stringify(data));
                        $("#mb_coin").val(data.data.mb_coin);
                        break;
                    case "cb" :
                        $("#balance_result").text('');
                        $("#balance_result").text(JSON.stringify(data));
                        break;
                    case "cl" :
                        $("#membercoin_result").text('');
                        $("#membercoin_result").text(JSON.stringify(data));
                        break;
                    default :
                        return;
                }


            },
            error : function(request, status, error){
                mainCart.add_cart_after(frm);
                alert('false ajax :'+request.responseText);
            }
        });
    }
    
</script>

</body>
</html>




