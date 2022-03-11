<?php
define('G5_IS_ADMIN', true);
include_once ('../common.php');

if( isset($token) ){
    $token = @htmlspecialchars(strip_tags($token), ENT_QUOTES);
}

run_event('admin_common');

$url = isset($_GET['url']) ? strip_tags($_GET['url']) : '';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url);
    else
        goto_url(G5_ADMIN_URL);
}

// 도메인으로 접속한 경우
/*if(!$is_member && strpos($_SERVER['HTTP_HOST'], '') !== false)
    goto_url(TB_ADMIN_URL.'');*/

$login_url        = G5_ADMIN_URL;
$login_action_url = G5_ADMIN_URL."/login_check.php";

?>

<!doctype html>
<html lang="ko">
<head>
    <title>ADMIN LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
    ?>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo G5_URL?>/logintemp/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?php echo G5_URL?>/logintemp/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo G5_URL?>/logintemp/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo G5_URL?>/logintemp/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login101">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo G5_URL?>/logintemp/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
                <span class="login100-form-title">
                    Admin Login
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
<script >
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
        if( $( document.body ).triggerHandler( 'outlogin1', [f, 'foutlogin'] ) !== false ){
            return true;
        }
        return false;
    }
</script>

</body>
</html>