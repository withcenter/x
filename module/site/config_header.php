<?php
	if ( ! admin() ) {
		echo "You are not admin";
		exit;
	}
	global $action;
?>
<link rel='stylesheet' href='<?=x::url()?>/module/site/site.css' />
<script src='<?=x::url()?>/module/site/site.js'></script>
<style>
.config-header a[href*='<?=$action?>'] {
	background-color: #6e6e6e;
}
</style>
<ul class='config-header'>
<li><a href="?module=site&action=config_first_page"><?=lang('Home')?></a></li>
<li><a href="?module=site&action=config_global"><?=lang('General')?></a></li>
<li><a href="?module=site&action=config_member"><?=lang('Member')?></a></li>
<li><a href="?module=site&action=config_menu"><?=lang('Menu')?></a></li>
<li><a href="?module=site&action=config_forum"><?=ln('Forum', '게시판')?></a></li>
<li><a href="?module=site&action=config_write"><?=lang('Writing')?></a></li>
<li><a href="?module=site&action=config_theme"><?=lang('Theme')?></a></li>
<li><a href="?module=site&action=config_mobile_theme"><?=lang('Mobile Theme')?></a></li>

<?php
	$files = file::getFiles( x::dir() . '/module', true, "/^site_menu\.php$/");
	foreach ( $files as $file ) {
		if ( file_exists( $file ) ) {
			$url = null;
			$name = null;
			include $file;
			echo "<li><a href='$url'>$name</a></li>";
		}
	}
?>
</ul>


