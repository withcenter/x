<?php
include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 



x::hook_register('tail_begin', 'hook_multisite_tail_begin');

function hook_multisite_tail_begin() {
	if(x::meta('theme_sidebar') == 'right') {
	?><style>
		#aside {float:right;}
		#container {border: none;}
	</style><?}
}
