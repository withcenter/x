<div class='site_top'>
	<div class='inner'>
		<a href='<?=g::url()?>'>홈</a>
		<? if ( login() ) {?>
			<a href='<?=G5_BBS_URL?>/logout.php'>로그아웃</a>
			<a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'>회원정보수정</a> 
		<?}
		else {?>
			<a href='<?=G5_BBS_URL?>/login.php'>로그인</a>
			<a href='<?=G5_BBS_URL?>/register.php'>회원가입</a> 
		<? } ?>

	</div>
</div>
