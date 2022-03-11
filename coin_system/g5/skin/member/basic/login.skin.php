<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<link rel="icon" type="image/png" href="<?php echo G5_URL?>/logintemp/images/icons/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo G5_URL?>/logintemp/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo G5_URL?>/logintemp/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo G5_URL?>/logintemp/css/main.css">

<!-- 로그인 시작 { -->
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo G5_URL?>/logintemp/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
                <span class="login100-form-title">
                    LET'S SIGN IN
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 required" type="text" name="mb_id" required placeholder="ID">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100 required" type="password" name="mb_password" required placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Login</button>
                </div>

                <div class="text-left p-t-12">
                    <input type="checkbox" name="auto_login" id="login_auto_login" >
                    <label for="login_auto_login"><span class="txt2"> 자동로그인</span></label>
                    <!--<span class="txt1"></span>-->
                    <!--<a class="txt2" href="#">
                        Username / Password?
                    </a>-->
                </div>

                <div class="text-left p-t-12">
                    <?php
                    include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
                    $captcha_html = captcha_html();
                    $captcha_js   = chk_captcha_js();
                    echo $captcha_html;
                    ?>
                </div>

                <div class="text-center p-t-136">
                    <span class="txt2">Welecome, P2P Coin Purchasing System.</span>
                    <!--<a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>-->
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo G5_URL?>/logintemp/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo G5_URL?>/logintemp/vendor/tilt/tilt.jquery.min.js"></script>

<script>
    $('.js-tilt').tilt({
        scale: 1.1
    });

    jQuery(function($){
        $("#login_auto_login").click(function(){
            if (this.checked) {
                this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
            }
        });
    });

    function flogin_submit(f)
    {

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
            return true;
        }
        return false;
    }
</script>
<!-- } 로그인 끝 -->

