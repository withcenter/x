<?=x::menu_link( 'right' )?>	
<? if ( login() ) { ?>
	<a href='<?=G5_BBS_URL?>/logout.php'><?=lang("Logout")?></a>
	<a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'><?=lang('Profile')?></a>
<? } else { ?>
	<a href='<?=G5_BBS_URL?>/login.php'><?=lang('Login')?></a>
	<a href='<?=G5_BBS_URL?>/register.php'><?=lang('Register')?></a>
<? } ?>

<a href='<?=url_language_setting()?>'><?=lang("Language")?></a>
<a href='<?=g::url()?>?device=mobile'><?=lang("Mobile")?></a>