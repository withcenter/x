<?php

	$path = $dir_root . '/bbs/delete_comment.php';
	$data = file::read($path);
	$src = "include_once('./_common.php');";
	$dst = "$src
include x::dir() . '/etc/hook/delete_comment.begin.php'; /* x patch */";
	$data = patch_string( $data, $src, $dst );
	
	
	$src = 'delete_cache_latest($bo_table);';
	$dst = "$src
include x::dir() . '/etc/hook/delete_comment.end.php'; /* x patch */";
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	