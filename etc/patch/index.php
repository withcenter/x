<?php
	echo "index.php	:";

	$path = $dir_root . '/index.php';
	$data = file::read($path);
	
	
	$p = "include x::theme_folder() . '/index.php';";
	if ( strpos( $data, $p ) ) {
		message("patched alredy");
		return;
	}
	
	
	
	
	
	$sp = "include_once('./_head.php');";
	$add = "
	include x::theme_folder() . '/index.php';
	include_once('./_tail.php');
	return;
";

	
	list ( $a, $b ) = explode( $sp, $data, 2 );
	
	$data = "$a$sp$add$b";
	
	
	file::write( $path,  $data );
	
	message("patched");
	