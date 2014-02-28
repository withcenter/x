<?php
	$path = $dir_root . '/tail.php';
	$data = file::read($path);
	$dst = "
	x::hook( 'tail_begin' );
	if ( file_exists( x::hook(__FILE__) ) ) {
		include x::hook(__FILE__);
		include_once(G5_PATH.'/tail.sub.php');
		return;
	}
	";
	if ( strpos( $data, $dst ) ) {
		patch_message("already patched");
	}
	else {
		$data = preg_replace( '/\?>/', $dst . "\n?>", $data, 1 );
		file::write( $path,  $data );
		patch_message("patched");
	}
