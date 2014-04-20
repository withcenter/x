<?
	if ( admin() ) $pre = 'admin_';
?>
<div class='dist-menu'>
<a href='?module=update&action=<?=$pre?>list'>SEARCH Source</a>
|
<? if ( admin() ) { ?>
<a href='?module=update&action=admin_installed_list'>INSTALLED Source</a>
|
<? } ?>
<a href='<?=X_URL_REAL?>?module=update&action=source' target='_blank'>UPLOAD Source</a>

<? if ( login() ) { ?>
|
<a href='?module=update&action=<?=$pre?>manage_source'>MANAGE Source</a>
<? } ?>
</div>
<style>
.dist-menu [href*='<?=$action?>'] {
	font-weight: bold;
}
</style>
 <p>&nbsp;</p>


