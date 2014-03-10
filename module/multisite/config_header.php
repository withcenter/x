<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multisite/subsite.css' />
<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	global $action;
?>
<ul class='multisite-menu'>
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_global'>일반 설정</a>
	</li>
	
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_member'>회원</a>
	</li>
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_menu'>메뉴</a>
	</li>
	
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_forum'>게시판</a>
	</li>
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_write'>글쓰기</a>
	</li>
	
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_theme'>테마</a>
	</li>
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_mobile_theme'>모바일 테마</a>
	</li>
	
	
	<li class='sub-menu'>
		<a href='?module=multisite&action=config_help'>도움말</a>
	</li>	
	
</ul>
<div style='clear:left;'></div>
<link rel="stylesheet" href="module/multisite/multisite.css">
<style>
.multisite-menu a[href*='<?=$action?>'] {
	background-color: #6e6e6e;
}
</style>
