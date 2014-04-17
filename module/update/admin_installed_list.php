<?php
	include 'dist-menu.php';
?>
<link rel="stylesheet" href="<?=module("$module.css")?>">
<div class='installed'>

	<div>
		<a href='?module=update&action=admin_installed_list&type=theme'><?=lang("THEME", "테마")?></a>
		|
		<a href='?module=update&action=admin_installed_list&type=widget'><?=lang("WIDGET", "위젯")?></a>
		|
		<a href='?module=update&action=admin_installed_list&type=module'><?=lang("MODULE", "모듈")?></a>
	</div>

	<div class='page-title'>
		<? if ( $type ) { ?>
			<?=ln("Installed <b>$type</b> List", "설치된 <b>$type</b> 목록")?>
		<? } else { ?>
			<?=ln("Select Menu Above", "위 메뉴를 선택하세요.")?>
		<? } ?>
	</div>
	
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
