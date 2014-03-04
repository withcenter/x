<?php
	$path = $dir_root . '/lib/latest.lib.php';
	$data = file::read($path);
	
	
	$src = '$cache_fwrite = false;';
	$dst =
		'x::hook( "latest" ); if ( $error_hook_latest < 0 ) return "No post on $bo_table";'
		. "\n\tinclude x::dir() . '/etc/hook/latest.lib.after-skin-info.php';"
		. "\n\t$src";
	$data = patch_string( $data, $src, $dst );
	
	$src = 'ob_start();';
	$dst = "
	x::hook( 'latest_before_skin' );
	include x::dir() . '/etc/hook/latest.lib.before-skin.php';
	$src
	";
	$data = patch_string( $data, $src, $dst );
	
	
	
	$src = "if(G5_IS_MOBILE) {";
	$dst = '/* x patch */ global $error_hook_latest, $skin_folder, $global_bo_table, $latest_skin_path, $latest_skin_url, $content; $skin_folder=$skin_dir; $global_bo_table=$bo_table;' . "\n\t$src\n";
	$data = patch_string( $data, $src, $dst );
	
	
	$src = 'return $content;';
	$dst = "x::hook( 'latest_before_return' );\n\t$src";
	$data = patch_string( $data, $src, $dst );
	
	
	file::write( $path,  $data );
	
	patch_message('patch data saved');
	