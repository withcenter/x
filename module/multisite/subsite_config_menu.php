<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multisite/subsite.css' />
<?php

		if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	
	if ( $in['action'] == 'config_global' ) $selected = 1;
	else if ( $in['action'] == 'config_menu' ) $selected = 2;
	else if ( $in['action'] == 'config_forum' ) $selected = 3;
	else if ( $in['action'] == 'config_write' ) $selected = 4;
	else if ( $in['action'] == 'config_theme' ) $selected = 5;
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
		<a setting_menu_no=1 href='?module=multisite&action=config_global'>일반 설정</a>
	</li>
	
	<li>
		<a setting_menu_no=2 href='?module=multisite&action=config_menu'>메뉴</a>
	</li>
	
	
	<li>
		<a setting_menu_no=3 href='?module=multisite&action=config_forum'>게시판</a>
	</li>
	
	<li>
		<a setting_menu_no=4 href='?module=multisite&action=config_write'>글쓰기</a>
	</li>
	
	
	<li>
		<a setting_menu_no=5 href='?module=multisite&action=config_theme'>테마</a>
	</li>
	
</ul>
<link rel="stylesheet" href="module/multisite/multisite.css">
<div style='clear:left'></div>
<!--[if IE 7]>
	<style>
		.multisite-menu ul {
			height 30px;
		}
		.multisite-menu ul li {
			border: 1px solid red;
			display: block;
			float: left;
			width: 70px;
		}
	</style>
<![endif]-->
