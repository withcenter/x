<?php
	patch_begin(__FILE__);
	$path = $dir_root . '/lib/outlogin.lib.php';
	$data = file::read($path);
	$src = "ob_start();";
	$dst = $src . "\nx::hook( 'outlogin' );";
	
	if ( pattern_exist($data, $dst) ) {
		echo("	already patched\n");
	}
	else {
		if ( ! pattern_exist($data, $src) ) {
			echo " srouce pattern does not exist. FAILED\n[ source patttern ] : $src";
			return;
		}
		else {
			$data = str_replace( $src, $dst, $data );
			echo " patched";
		}
	}
	
	
	
	$src = " if (array_key_exists('mb_nick', ";
	$dst = '/* x patch */ global $skin_folder, $outlogin_skin_path, $outlogin_skin_url; $skin_folder=$skin_dir;' . "\n" . $src;
	
	if ( pattern_exist($data, $dst) ) {
		echo("	already patched\n");
	}
	else {
		if ( ! pattern_exist($data, $src) ) {
			echo " srouce pattern does not exist. FAILED\n[ source patttern ] : $src";
			return;
		}
		else {
			$data = str_replace( $src, $dst, $data );
			echo " patched";
		}
	}
	
	file::write( $path,  $data );
	
	
	
	
	
		