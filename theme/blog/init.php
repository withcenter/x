<?php

x::hook_register('head_begin', 'hook_multisite_head_begin');
function hook_multisite_head_begin() {
	//set_session('ss_mb_id','user02');
	//di($_SESSION);
}


x::hook_register('tail_begin', 'hook_multisite_tail_begin');

function hook_multisite_tail_begin() {
	if(ms::meta('theme_sidebar') == 'right') {
	?><style>
		#aside {float:right;}
		#container {border: none;}
	</style><?}
}
