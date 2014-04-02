<?=x::menu_link( 'right' )?>	
<? if ( login() ) { 
	if (super_admin()) {  ?>
		<a href="<?=x::url_admin()?>">X ADMIN</a><a href="<?php echo G5_ADMIN_URL ?>">ADMIN</a>
	<?}
	if ( admin() ) {?>
		<a href='<?=url_site_config()?>'>사이트 관리</a>
	<?}?>
	<a href='<?=G5_BBS_URL?>/logout.php'>로그아웃</a>
	<a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'>회원정보수정</a>
<? } else { ?>
	<a href='<?=G5_BBS_URL?>/login.php'>로그인</a>
	<a href='<?=G5_BBS_URL?>/register.php'>회원가입</a>
<? } ?>

<a href='<?=url_language_setting()?>'>언어변경</a>
<a class='last_menu' href='<?=g::url()?>?device=mobile'>모바일</a>