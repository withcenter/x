<?php

?>
<b>DIRECT INSTALL</b><br>

<br>
Allow URL fopen : <?
	if ( ini_get('allow_url_fopen') ) echo "OK";
	else {
		$is_error = 1;
		echo		"<b style='color:red;'>Error</b>";
	}
?><br>


OpenSSL : <?
if ( extension_loaded('openssl')) echo "OK";
else {
	$is_error = 1;
	echo "<b style='color:red;'>Error</b>";
}
?>

<br>
ZipArchive :
<?
	if ( extension_loaded('zip')) echo 'OK';
	else {
		$is_error = 1;
		echo "<b style='color:red;'>Error</b>";
	}
?>
<br>

<? if ( $is_error ) { ?>
	Fix error above.
<? } else { ?>
<a href='?module=update&action=admin_direct_install_submit&source_link=<?=$source_link?>&theme=y' style="display:inline-block; padding: 1em; border: 1px solid grey; background-color: #efefef;">
	INSTALL Directly into your web server</a>
<? } ?>

<br>


<br>
@warning : updated files are owned by web service demon which can cause security problem.<br>

Use this only for test purpose.