<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multisite/subsite.css' />
<?php

		if ( ! ms::admin() || $is_admin != 'super' ) {
		echo "You are not admin";
		return;
	}
	
	if ( $in['action'] == 'config_global' ) $selected = 1;
	else if ( $in['action'] == 'config_menu' ) $selected = 2;
	else if ( $in['action'] == 'config_forum' ) $selected = 3;
	else if ( $in['action'] == 'config_theme' ) $selected = 4;
	else $selected = null;
	
	if ( $selected ) {
		echo "
			<style>
				.multisite-menu li a[setting_menu_no='".$selected."'] {
					background-color: #616161;
				}
			</style>
		";
	
	}
?>
<ul class='multisite-menu'>
	
	<li>
		<a setting_menu_no=1 href='?module=multisite&action=config_global'>Global Settings</a>
	</li>
	
	<li>
		<a setting_menu_no=2 href='?module=multisite&action=config_menu'>Menu</a>
	</li>
	
	
	<li>
		<a setting_menu_no=3 href='?module=multisite&action=config_forum'>Forum</a>
	</li>
	
	
	<li>
		<a setting_menu_no=4 href='?module=multisite&action=config_theme'>Theme</a>
	</li>
	
</ul>
<link rel="stylesheet" href="module/multisite/multisite.css">
