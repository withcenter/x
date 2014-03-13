<?php

	$path = $dir_root . '/bbs/good.php';
	$data = file::read($path);
	$src = "?>";
	$dst = "include x::dir() . '/etc/hook/good.php'; /* x patch */
$src";
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	