<?include 'menu.php'?>
<div class='installed'>
	<div class='title'><?=ln("Widget Module List", "설치된 모듈 목록")?></div>
<?php
$type = "module";
$dirs = file::getDirs(X_DIR_MODULE);
foreach ( $dirs as $dir ){
	$path = X_DIR_MODULE . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	$config = load_config( $path );
	include "admin_display_installed_item.php";
}
?>
</div>
