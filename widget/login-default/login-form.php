
<div class='login-form'>
<form action="<?=url_login_check()?>" method="post" autocomplete="off">

	<input type="hidden" name="url" value="<?=urlencode($_SERVER['REQUEST_URI'])?>">
	
	<div class='login-username'><div class='inner'><input type="text" name="mb_id" class="id" maxlength="20" placeholder="<?=ln("User ID", "아이디")?>"></div></div>
	<div class='login-password'><div class='inner'><input type="password" name="mb_password" class="password" maxlength="20" placeholder="<?=ln("Password", "비밀번호")?>"></div></div>
	<div class='login-submit'><div class='inner'><input type="submit" value="로그인"></div></div>
	<div class='remember-register'>
		<div class='login-remember'>
			<div class='inner'>
				<img class='remember-me-check' src='<?=$widget_config['url']?>/unchecked.png' />
				<input type="checkbox" style='display: none;' name="auto_login" value="1" id="auto_login">자동 로그인
			</div>
		</div>
		<div class='login-divider'></div>
		<div class='register-lost-password'>
			<a href="<?=url_bbs()?>/register.php">회원가입</a> ~ 	<a href="<?=url_bbs()?>/password_lost.php">정보찾기</a>
		</div>
	</div>
	<!--<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
			<td>
				<input type="text" name="mb_id" class="id" maxlength="20" placeholder="<?=ln("User ID", "아이디")?>">
				<input type="password" name="mb_password" class="password" maxlength="20" placeholder="<?=ln("Password", "비밀번호")?>">
			</td>
			<td><input type="submit" value="로그인"></td>
		</tr>
		<tr>
			<td colspan=2>
				<div class='bottom'>
            <a href="<?=url_bbs()?>/register.php"><b>회원가입</b></a>
            <a href="<?=url_bbs()?>/password_lost.php">정보찾기</a>
			
            <input type="checkbox" name="auto_login" value="1" id="auto_login">
            <label for="auto_login" id="auto_login_label">자동로그인</label>
			</div>
			</td>
		</tr>
	</table>-->
</form>
</div>

<script>

$(function() {	
	$(".remember-me-check").click(function() {
		if ( $("#auto_login").is(":checked") ) {
			$(this).attr('src', '<?=$widget_config['url']?>/unchecked.png');
			$("#auto_login").prop('checked', false);
		}
		else {
			$(this).attr('src', '<?=$widget_config['url']?>/checked.png');
			$("#auto_login").prop('checked', true);
		}
	});	
});


</script>