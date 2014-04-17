DEPRECATED; exit;
<?exit;?>

<?include 'menu.php'?>
<div class='installed'>
	<div class='title'><?=ln("Installed $type List", "설치된 $type 목록")?></div>
<?php
$dirs = file::getDirs( x::dir() . "/$type" );
foreach ( $dirs as $dir ){
	$path = x::dir() . "/$type/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	$config = load_config( $path );
	include "admin_display_installed_item.php";
}
?>
</div>
