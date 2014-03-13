<?php
	$path = $dir_root . '/bbs/write_comment_update.php';
	$data = file::read($path);
	$src = 'delete_cache_latest($bo_table);';
	$dst = "$src
include x::dir() . '/etc/hook/write_comment_update.begin.php'; /* x patch */";
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	
	
		