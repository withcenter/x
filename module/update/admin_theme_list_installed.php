<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu_theme.php'?>
<div class='installed'>
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
