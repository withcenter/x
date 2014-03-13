<?php
	$path = $dir_root . '/lib/outlogin.lib.php';
	$data = file::read($path);
	
	
	
	$src = "if (array_key_exists('mb_nick',";
	$dst = "include x::dir() . '/etc/hook/outlogin.lib.begin.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = "ob_start();";
	$dst = "include x::dir() . '/etc/hook/outlogin.lib.before-skin.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = 'return $content;';
	$dst = "include x::dir() . '/etc/hook/outlogin.lib.end.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	
	file::write( $path,  $data );
	