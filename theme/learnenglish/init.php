<?php

x::hook_register('head_begin', function() {
} );

x::hook_register('tail_begin', 'hook_multisite_tail_begin');

function hook_multisite_tail_begin() {
	global $extra;
	if($_SERVER['SCRIPT_NAME'] == '/index.php') {
	?>
		<style>
			#aside {display: none;}
			#container {border: 0! important; width: 938px;}
		</style>
	<?
	}
	if($extra['theme_sidebar'] == 'left') {
	?><style>
		#aside {float:left;}
		#container {border-right: 0; border-left: 1px solid #dde4e9;}
	</style><?}
}
	