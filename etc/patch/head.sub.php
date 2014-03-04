<?php
	$path = $dir_root . '/head.sub.php';
	$data = file::read($path);
	
	
	$src = "<body>";
	$dst = $src . "\n\t<?php x::hook( 'body_begin' );?>\n";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	