<?php

x::hook_register('tail_begin', 'hook_multisite_tail_begin');

$theme_sidebar = ms::meta('theme_sidebar');
function hook_multisite_tail_begin() {
	global $theme_sidebar;
	if( empty($theme_sidebar))  $theme_sidebar = 'left';
	if($theme_sidebar == 'right') {
	?><style>
		#aside {float:right;}
		#container {border: none;}
	</style><?}
}
