<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu_theme.php'?>
<?php

	$cwd = getcwd();
	$host = $_SERVER['HTTP_HOST'];
	$dir = "$cwd/$dir";
	
	$var = "&dir=".urlencode($dir)."&host=".urlencode($host);
?>
<div class='admin-ftp'>
	<iframe src="http://g5x2.org/x/?module=update&action=main_server_ftp_delete&theme=n&<?=$var?>"></iframe>
</div>
