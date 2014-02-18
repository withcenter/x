<?php

x::hook_register('tail_begin', 'hook_multisite_tail_begin');

$theme_sidebar = ms::meta('theme_sidebar');
function hook_multisite_tail_begin() {
	global $theme_sidebar;

	if($_SERVER['SCRIPT_NAME'] == '/index.php') {
	?>
		<style>
			#aside { display: none; }
			#container { padding-top: 0.75em; width: 980px; }
		</style>
	<?}
	
	if($theme_sidebar == 'left') {
	?><style>
		#aside {float:left;}
		#container {border-right: 0; border-left: 1px solid #dde4e9;}
	</style><?}
}
