<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu_theme.php'?>
<?php
	$themes = get_themes();
	$dirs = array();
	foreach ( $themes as $th ) {
		$dirs[] = "dirs[]=$th[dir]";
	}
	$var = implode('&', $dirs);
	
?>
<div class='list'>
	<iframe src="<?=URL_EXTENDED?>/x/?module=update&action=theme_list&theme=n&<?=$var?>"></iframe>
</div>
