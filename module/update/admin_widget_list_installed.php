<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu.php'?>
<div class='installed'>

<div class='title'><?=ln("Widget Installed List", "설치된 위젯 목록")?></div>


<?php
$type = "widget";
$dirs = file::getDirs(X_DIR_WIDGET);
foreach ( $dirs as $dir ){
	$path = X_DIR_WIDGET . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	$config = load_config( $path );
	include "admin_display_installed_item.php";
}
?>
</div>
