<?php
	$path = $dir_root . '/index.php';
	$data = file::read($path);
	$src = "if (G5_IS_MOBILE) {";
	$dst = "
	
	/** x patch */
	if ( ! G5_IS_MOBILE ) include_once('./_head.php'); // g5 loads head.php in index.php for pc and does not loads for mobile.
	x::hook( 'head_begin' );
	if ( file_exists( x::hook(__FILE__) ) ) {
		include x::hook(__FILE__);
		include_once('./_tail.php');
		return;
	}
	$src
	";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	

	