<?php

x::hook_register('head_begin', function() {
} );

x::hook_register('tail_begin', 'hook_multisite_tail_begin');

function hook_multisite_tail_begin() {
	global $extra;
	if( $extra['theme_sidebar'] == '' || !array_key_exists('theme_sidebar',$extra)) $extra['theme_sidebar'] = 'left';
	if($extra['theme_sidebar'] == 'left') {
	?><style>
		#aside {float:left;}
		#container {border-right: 0; border-left: 1px solid #dde4e9;}
	</style><?}
}
	