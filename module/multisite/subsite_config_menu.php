<?php

	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}

?>
<ul class='multisite-menu'>
	
	<li>
		<a href='?module=multisite&action=config_global'>Global Settings</a>
	</li>
	
	<li>
		<a href='?module=multisite&action=config_menu'>Menu</a>
	</li>
	
	
	<li>
		<a href='?module=multisite&action=config_forum'>Forum</a>
	</li>
	
	
	<li>
		<a href='?module=multisite&action=config_theme'>Theme</a>
	</li>
	
</ul>
<link rel="stylesheet" href="module/multisite/multisite.css">
