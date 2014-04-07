<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu.php'?>
<div class='installed'>
	<div class='title'><?=ln("Widget Theme List", "설치된 테마 목록")?></div>
<?php
$type = "theme";
$dirs = file::getDirs(X_DIR_THEME);
foreach ( $dirs as $dir ){
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	$config = load_config( $path );
	include "admin_display_installed_item.php";
}
?>
</div>
