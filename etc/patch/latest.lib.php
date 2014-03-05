<?php
	$path = $dir_root . '/lib/latest.lib.php';
	$data = file::read($path);
	
	
	
	
	$src = "if(G5_IS_MOBILE) {";
	$dst = "include x::dir() . '/etc/hook/latest.lib.begin.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	
	
	$src = '$cache_fwrite = false;';
	$dst = "include x::dir() . '/etc/hook/latest.lib.after-skin-info.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	
	
	$src = 'ob_start();';
	$dst = "include x::dir() . '/etc/hook/latest.lib.before-skin.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	
	
	$src = 'return $content;';
	$dst = "include x::dir() . '/etc/hook/latest.lib.before-return.php';
	$src";
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	patch_message('patch data saved');
	