<?php
	$path = $dir_root . '/lib/latest.lib.php';
	$data = file::read($path);
	
	
	$src = "ob_start();";
	$dst = $src . "\n\tx::hook( 'latest' );";
	
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = "if(G5_IS_MOBILE) {";
	$dst = '/* x patch */ global $skin_folder, $latest_skin_path, $latest_skin_url; $skin_folder=$skin_dir;' . "\n" . $src;
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	patch_message('patch data saved');