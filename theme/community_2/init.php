<?php
x::hook_register('tail_begin', 'hook_multisite_tail_begin');

$theme_sidebar = x::meta('theme_sidebar');
function hook_multisite_tail_begin() {
	global $theme_sidebar;

	if($theme_sidebar == 'right') {
	?><style>
		.layout .main-content .left { float:right; width: 190px; }
		.layout .main-content .content { float: left; width: 760px; }
	</style><?}?>

<? }
