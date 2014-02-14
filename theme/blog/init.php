<?php

x::hook_register('tail_begin', 'hook_multisite_tail_begin');

function hook_multisite_tail_begin() {
	if(ms::meta('theme_sidebar') == 'right') {
	?><style>
		#aside {float:right;}
		#container {border: none;}
	</style><?}
}
