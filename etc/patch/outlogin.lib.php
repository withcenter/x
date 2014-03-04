<?php
	$path = $dir_root . '/lib/outlogin.lib.php';
	$data = file::read($path);
	$src = "ob_start();";
	$dst = $src . "\nx::hook( 'outlogin' );";
	
	if ( pattern_exist($data, $dst) ) {
		patch_message('already patched');
	}
	else {
		if ( ! pattern_exist($data, $src) ) {
			echo " srouce pattern does not exist. FAILED\n[ source patttern ] : $src";
			patch_failed();
		}
		else {
			$data = str_replace( $src, $dst, $data );
			patch_message('patched');
		}
	}
	
	
	
	$src = " if (array_key_exists('mb_nick', ";
	$dst = '/* x patch */ global $skin_folder, $outlogin_skin_path, $outlogin_skin_url; $skin_folder=$skin_dir;' . "\n" . $src;
	
	if ( pattern_exist($data, $dst) ) {
		patch_message('already patched');
	}
	else {
		if ( ! pattern_exist($data, $src) ) {
			echo " srouce pattern does not exist. FAILED\n[ source patttern ] : $src";
			patch_failed();
		}
		else {
			$data = str_replace( $src, $dst, $data );
			patch_message('patched');
		}
	}
	
	file::write( $path,  $data );
	patch_message('patch data saved');