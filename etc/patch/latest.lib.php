<?php
	patch_begin(__FILE__);
	$path = $dir_root . '/lib/latest.lib.php';
	$data = file::read($path);
	
	
	$src = "ob_start();";
	$dst = $src . "\nx::hook( 'latest' );";
	
	$re = patch_string( $data, $src, $dst );
	
	
	
	$src = "if(G5_IS_MOBILE) {";
	$dst = '/* x patch */ global $skin_folder, $latest_skin_path, $latest_skin_url; $skin_folder=$skin_dir;' . "\n" . $src;
	$re = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	
	
	
	
		