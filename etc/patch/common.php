<?php

	$path = $dir_root . '/common.php';
	$data = file::read($path);
	
	
	$src = '$config = array();';
	$dst = "$src
" . '$in = array_merge( $_GET, $_POST ); /* x patch */';
	$data = patch_string( $data, $src, $dst );
	
	
	
	/** @short 이 부분은 G5 가 패치되기를 기다렸다가 패치되면 제거를 한다. */
	
	$src = "SERVER_NAME";
	$dst = "HTTP_HOST";
	$data = patch_string( $data, $src, $dst );
	
	$src = '$'."_SERVER['SCRIPT_NAME']";
	$dst = "preg_replace('#/+#', '/', ".'$'."_SERVER['SCRIPT_NAME'])";
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = '$html_process = new html_process();';
	$dst = '/* $html_process moved before loading extend sripts */';
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = "include_once(G5_BBS_PATH.'/visit_insert.inc.php');";
	$dst = "$src
" . '$html_process = new html_process();';
	$data = patch_string( $data, $src, $dst );
	
	
	$src = 'ob_start();';
	$dst = '/* ob_start(); moved before loading extend sripts */';
	$data = patch_string( $data, $src, $dst );
	
	$src = "include_once(G5_BBS_PATH.'/visit_insert.inc.php');";
	$dst = "$src
ob_start();";
	$data = patch_string( $data, $src, $dst );
	
	file::write( $path,  $data );
	
	