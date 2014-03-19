<?php

	$path = $dir_root . '/common.php';
	$data = file::read($path);
	$src = '$html_process = new html_process();';
	$dst = '/* $html_process moved before loading extend sripts */';
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = "include_once(G5_BBS_PATH.'/visit_insert.inc.php');";
	$dst = "$src
" . '$html_process = new html_process();';
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	