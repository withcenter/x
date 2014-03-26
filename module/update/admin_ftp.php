
<?php

	$cwd = getcwd();
	$host = $_SERVER['HTTP_HOST'];
	$dir = "$cwd/$dir";
	
	$var = "&dir=".urlencode($dir)."&host=".urlencode($host);
?>

<div class='list'>
	<iframe src="<?=URL_EXTENDED?>/x/?module=update&action=ftp_delete&theme=n&<?=$var?>"></iframe>
</div>
