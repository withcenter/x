<?php

x::hook_register('tail_begin', 'hook_multisite_tail_begin');

$theme_sidebar = x::meta('theme_sidebar');
function hook_multisite_tail_begin() {
	global $theme_sidebar;

	if($theme_sidebar == 'right') {
	?><style>
		.layout > .inner  > .left {
			float: right;
			margin: 0;
		}
		.layout > .inner  > .container {
			float: left;
		}
	</style><?}
}
