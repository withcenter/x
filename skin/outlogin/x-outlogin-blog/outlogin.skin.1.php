<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<link rel="stylesheet" href="<?php echo $outlogin_skin_url ?>/style.css">

<div class='login-box'><div class='inner'>
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
		<div class='login-box-top'>
			<p>로그인을 해 주세요</p>
			
			<div style='clear:both;'></div>
		</div>
		
		<div class='login-box-middle'>
			<input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
			<div class='username'><input type="text" name="mb_id" required placeholder='아이디'  style="background: url('<?=$outlogin_skin_url?>/img/username.png') no-repeat 5% 50%;" /></div>
			<div><input type="password" name="mb_password" id="ol_pw" required placeholder='비밀번호' style="background: url('<?=$outlogin_skin_url?>/img/password.png') no-repeat 5% 50%;" /></div>
		</div>
		
		<div class='login-box-bottom'>
          <div class='submit-button'><input type="submit"  value="로그인"></div>
           
			<!--<div class='remember'>
				<input type="checkbox" name="auto_login" value="1" id="auto_login">
				<label for="auto_login" class='remember-text' id="auto_login_label"></label>
			</div>-->
			<div class='setting'>
			<a class='register-right' href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a> 
				<a class='find-password' id="ol_password_lost" href="<?php echo G5_BBS_URL ?>/password_lost.php" target='_blank'>비밀번호 찾기</a>
			</div>
		</div>
		
    </form>
</div></div>

<script>

$(function() {
    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
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
