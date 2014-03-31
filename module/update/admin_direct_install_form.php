<?php

?>
<b>DIRECT INSTALL</b><br>

<a href='?module=update&action=admin_direct_install_submit&source_link=<?=$source_link?>&theme=y'>INSTALL Directly into your web server</a><br>

<br>
ZipArchive :
<?
	if ( extension_loaded('zip')) echo 'Yes';
	else echo "<b>No</b>";
?>
<br>

<br>
@warning : updated files are owned by web service demon which can cause security problem.<br>

Use this only for test purpose.