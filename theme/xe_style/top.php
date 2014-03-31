<div class='xe-top'>
	<div class='inner'>
		<div class='left'>
			<a href='<?=g::url()?>'><?=lang('HOME')?></a>
			<? if ( login() ) { ?>
				<a href='<?=G5_BBS_URL?>/logout.php'><?=lang("SIGN-OUT")?></a>
				<a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'><?=lang('ACCOUNT')?></a>
			<? } else { ?>
				<a href='<?=G5_BBS_URL?>/login.php'><?=lang('SIGN-IN')?></a>
				<a href='<?=G5_BBS_URL?>/register.php'><?=lang('REGISTER')?></a>
			<? } ?>
				
			<?=x::menu_link( 'left' )?>
		</div>
			
		<div class='right'>
			<?=x::menu_link( 'right' )?>
			<a href='<?=url_language_setting()?>'><?=lang("Change Language")?></a>
			<a href='<?=g::url()?>?device=mobile'><?=lang("Mobile View")?></a>
		</div>	
	</div>
	<div style='clear:both;'></div>
</div>