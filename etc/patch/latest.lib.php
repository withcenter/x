<?php
	$path = $dir_root . '/lib/latest.lib.php';
	$data = file::read($path);
	
	
	$src = "ob_start();";
	$dst = $src . "\n\tx::hook( 'latest' );";
	$data = patch_string( $data, $src, $dst );
	
	$src = "if(G5_IS_MOBILE) {";
	$dst = '/* x patch */ global $skin_folder, $global_bo_table, $latest_skin_path, $latest_skin_url, $content; $skin_folder=$skin_dir; $global_bo_table=$bo_table;' . "\n$src\n\t";
	$data = patch_string( $data, $src, $dst );
	
	
	$src = 'return $content;';
	$dst = "x::hook( 'latest_before_return' );\n\t$src";
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	patch_message('patch data saved');
	