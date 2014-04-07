<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu.php'?>
<div class='installed'>
	<div class='title'><?=ln("Widget Module List", "설치된 모듈 목록")?></div>
<?php
$dirs = file::getDirs(X_DIR_THEME);
foreach ( $dirs as $dir ){
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	$theme_config = load_config( $path );
	include "admin_theme_list_installed_display.php";
}
?>
</div>
