<?
	if ( admin() ) $pre = 'admin_';
?>
<div class='dist-menu'>
<a href='?module=update&action=<?=$pre?>list'>SEARCH Source</a>
|
<? if ( admin() ) { ?>
<a href='?module=update&action=list_installed'>INSTALLED Source</a>
|
<? } ?>
<a href='<?=X_URL_REAL?>?module=update&action=source'>UPLOAD Source</a>
</div>
<style>
.dist-menu [href*='<?=$action?>'] {
	font-weight: bold;
}
</style>
 <p>&nbsp;</p>


