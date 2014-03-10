<?php
	$path = $dir_root . '/bbs/board.php';
	$data = file::read($path);
	$src = "include_once('./board_head.php');";
	$dst = "	include x::dir() . '/etc/hook/board.before-head.php'; /* x patch */
	$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	

	