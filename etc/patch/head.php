<?php
	$path = $dir_root . '/head.php';
	$data = file::read($path);
	$src = "if (G5_IS_MOBILE) {";
	$dst = "
	x::hook( 'head_begin' );
	if ( file_exists( x::hook(__FILE__) ) ) {
		include x::hook(__FILE__);
		return;
	}
	$src
	";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	