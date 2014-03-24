<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="extended_login" class="extended_skin">
<div class='inner'>
	<div class='title login'><?php echo $g5['title'] ?></div>
	<div class='title register'><a href='<?=G5_BBS_URL?>/register.php'>회원가입</a></div>
	<div style='clear:both'></div>
    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
    <input type="hidden" name="url" value='<?php echo $login_url ?>'>

    <fieldset id="extended_login_fields">
        <div class='label' for="login_id" class="login_id">회원아이디</div>
        <input type="text" name="mb_id" id="login_id" required class="frm_input required" size="20" maxLength="20">
        <div class='label' for="login_pw" class="login_pw">비밀번호</div>
        <input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20" maxLength="20">
		<div class='checkbox_wrapper'>
			<input type="checkbox" name="auto_login" id="login_auto_login">
			<div class='checkbox_label' for="login_auto_login">자동로그인</div>
		</div>
        <input type="submit" value="로그인" class="btn_submit">      
    </fieldset>
    </form>
</div>
</div>

<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
<!-- } 로그인 끝 -->