<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<link rel="stylesheet" href="<?php echo $outlogin_skin_url ?>/style.css">

<div class='login-box-mobile'>
	<div class='login-box-middle'>
		<form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
			<input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
		
			<div  class='login-input'>
				<div class='login-user'>
					<input type="text" id="ol_id" name="mb_id" required  maxlength="20" placeholder='아이디'>
				</div>			
				<div class='login-pass'>
					<input type="password" name="mb_password" id="ol_pw" required maxlength="20" placeholder='비밀번호'>
				</div>
				<div style='clear:both'></div>
			</div>
			<div class='submit-button'>
				<input type="image" id="ol_submit" src='<?=$outlogin_skin_url?>/signin_button.png' />				
			</div>
			<div style='clear:both'></div>
			<div class='register_autologin'>
				<span class='auto_login'><input type="checkbox" name="auto_login" value="1" id="auto_login">자동 로그인</span>
				<a href='<?=G5_URL?>/<?=G5_BBS_DIR?>/register.php' class='login-reg'><b>회원가입</b></a>
				<a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">아이디/비번 찾기</a>
				<div style='clear:both;'></div>
			</div>
										
		</form>
		<div style='clear:both'></div>
	</div>
</div>

<script>

$(function() {	
	 $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 패스워드를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    return true;
}
</script>
<!-- } 로그인 전 아웃로그인 끝 -->
