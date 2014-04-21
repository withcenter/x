<div class='login-form'>
<form action="<?=url_login_check()?>" method="post" autocomplete="off">
<input type="hidden" name="url" value="<?=urlencode($_SERVER['REQUEST_URI'])?>">
	<table cellpadding='0' cellspacing='0' width='100%'>
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
            <a href="<?php echo G5_BBS_URL ?>/register.php"><b>회원가입</b></a>
            <a href="<?php echo G5_BBS_URL ?>/password_lost.php">정보찾기</a>
			
            <input type="checkbox" name="auto_login" value="1" id="auto_login">
            <label for="auto_login" id="auto_login_label">자동로그인</label>
			</div>
			</td>
		</tr>
	</table>
</form>
</div>
