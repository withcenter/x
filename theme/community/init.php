<?php
include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 
x::hook_register('tail_begin', 'hook_multisite_tail_begin');

$theme_sidebar = ms::meta('theme_sidebar');
function hook_multisite_tail_begin() {
	global $theme_sidebar;
	
	if($theme_sidebar == 'right') {
	?><style>
		#aside {float:right;}
	</style><?}
	
	?>

	<?
}
