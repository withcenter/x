<?php
	x::hook( 'body_begin' );
	

	if ( super_admin() ) include x::dir() . '/etc/check_update.php';

	