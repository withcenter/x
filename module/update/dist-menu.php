<?
	if ( admin() ) $pre = 'admin_';
?>
<div class='dist-menu'>
<a href='?module=update&action=<?=$pre?>list'>SEARCH Source</a>
|
<a href='?module=update&action=list_installed'>INSTALLED Source</a>
|
<a href='?module=update&action=admin_source'>UPLOAD Source</a>
</div>
<style>
.dist-menu [href*='<?=$action?>'] {
	font-weight: bold;
}
</style>
 <p>&nbsp;</p>


