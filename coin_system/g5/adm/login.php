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

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";
?>

<style>
    @charset "utf-8";

    /* 초기화 */
    html {overflow-y:scroll}
    body {margin:0;padding:0;font-size:0.75em;font-family:'Malgun Gothic', dotum, sans-serif;background:#fff}
    html, h1, h2, h3, h4, h5, h6, form, fieldset, img {margin:0;padding:0;border:0}
    h1, h2, h3, h4, h5, h6 {font-size:1em;font-family:'Malgun Gothic', dotum, sans-serif}
    article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {display:block}

    ul, dl,dt,dd {margin:0;padding:0;list-style:none}
    legend {position:absolute;margin:0;padding:0;font-size:0;line-height:0;text-indent:-9999em;overflow:hidden}
    label, input, button, select, img {vertical-align:middle;font-size:1em}
    input, button {margin:0;padding:0;font-family:'Malgun Gothic', dotum, sans-serif;font-size:1em}
    input[type="submit"] {cursor:pointer}
    button {cursor:pointer; border: 0;}

    textarea, select {font-family:'Malgun Gothic', dotum, sans-serif;font-size:1em}
    select {margin:0}
    p {margin:0;padding:0;word-break:break-all}
    hr {display:none}
    pre {overflow-x:scroll;font-size:1.1em}
    a {color:inherit; text-decoration:none}

    *, :after, :before {
        position: relative;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
    }

    * {transition: .25s all ease;}

    .log-container {display: block; position: relative; margin: 4rem auto 0; padding: 5rem 4rem 0 4rem; width: 100%; max-width: 525px; min-height: 680px; background: linear-gradient(rgb(27, 40, 61), #eee 130%); border-radius: 3px;}

    .logbox {position: relative; padding-bottom: 4.5rem; border-bottom: 1px solid rgba(255, 255, 255, 0.25);}

    .log-nav {position: relative; padding: 0; margin: 0 0 3rem 1rem;}
    .log-nav > li {list-style: none; display: inline-block; }
    .log-nav > li:nth-child(1) {margin: 0 80px;}
    .log-nav > li > a {position: relative; color: rgba(255, 255, 255, 0.7); font-weight: 500; font-size: 1.25rem; padding-bottom: .5rem; transition: .20s all ease;}
    .log-nav > li > a:hover, .log-nav > .active > a {color: #fff; transition: .15s all ease;}
    .log-nav > li > a:after {content: ''; display: inline-block; height: 10px; background-color: rgba(255, 255, 255); position: absolute; right: 100%; bottom: -1px; left: 0; border-radius: 50%; transition: .15s all ease;}
    .log-nav > li > a:hover:after, .log-nav > .active > a:after {background-color: rgb(27, 40, 61); height: 2px; right: 0; bottom: 2px; border-radius: 0; transition: .20s all ease;}

    .log-label {display: block; padding-left: 1rem;}
    .log-label, .log-label-ckbox {color: rgba(255, 255, 255, 0.7); font-size: 0.75rem; margin-bottom: 1rem;}
    .log-label-ckbox {display: inline-block; position: relative; padding-left: 1.5rem; margin-top: 2rem; margin-left: 1rem; color: #fff; font-size: 0.75rem; text-transform: inherit;}

    .log-input {color: white; font-size: 1.15rem; width: 100%; padding: .5rem 1rem; border: 2px solid transparent; outline: none; border-radius: 3px; background-color: rgba(255, 255, 255, 0.25); letter-spacing: 1px;}
    .log-input:hover, .log-input:focus {color: white; border: 2px solid rgba(255, 255, 255, 0.5);}
    .log-input + .log-label {margin-top: 1.5rem;}
    .log-input-ckbox {position: absolute; top: .1rem; left: 0; margin: 0;}

    .log-submit {color: #fff; font-size: 1rem; letter-spacing: 1px; margin-top: 1rem; padding: .75rem; border-radius: 3px; display: block; width: 100%; background-color: rgb(27, 40, 61); border: none; cursor: pointer;}
    .log-submit:hover {background-color: rgb(14, 8, 46);}

    .log-forgot {display: block; margin-top: 3rem; text-align: center; color: rgba(255, 255, 255, 0.75); font-size: 0.75rem; position: relative;}
    .log-forgot:hover {color: rgb(27, 40, 61);}


</style>

<div class="log-container">
    <form class="logbox" name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
        <ul class="log-nav">
            <li class="active"><a href="#">로그인</a></li>
            <!--<li><a href="<?php /*echo G5_BBS_URL */?>/register.php">회원가입</a></li>-->
        </ul>
        <input type="hidden" name="url" value="<?php echo $login_url ?>">
        <label for="login_id" class="log-label">아이디</label>
        <input id="login_id" name="mb_id" type="text" class="log-input" required placeholder="id">
        <label for="login_pw" class="log-label">비밀번호</label>
        <input id="login_pw" name="mb_password" type="password" class="log-input" required placeholder="password">
        <label for="auto_login" id="auto_login_label" class="log-label-ckbox">
            <input id="auto_login" name="auto_login" type="checkbox" class="log-input-ckbox" value="1">자동로그인
        </label>
        <button type="submit" class="log-submit">로그인</button>
    </form>
    <!--<a href="<?php /*echo G5_BBS_URL */?>/password_lost.php" class="log-forgot">비밀번호 찾기</a>-->

    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    #@include_once(get_social_skin_path().'/social_login.skin.php');
    ?>

</div>

<script>
    jQuery(function($){
        $("#auto_login").click(function(){
            if (this.checked) {
                this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
            }
        });
    });

    function fhead_submit(f)
    {
        if( $( document.body ).triggerHandler( 'outlogin1', [f, 'foutlogin'] ) !== false ){
            return true;
        }
        return false;
    }
</script>