<?php
	$path = $dir_root . '/bbs/write_update.php';
	$data = file::read($path);
	$src = '$msg = array();';
	$dst = "$src
	include x::dir() . '/etc/hook/write_update.begin.php';";
	$data = patch_string( $data, $src, $dst );
	
	
	$src = '@include_once($board_skin_path.\'/write_update.skin.php\');';
	$dst = "include x::dir() . '/etc/hook/write_update.end.php';
	$src;";
	
	
	if ( pattern_exist($data, $dst) ) {
		patch_message('already patched');
	}
	else {
		if ( ! pattern_exist($data, $src) ) {
			echo " srouce pattern does not exist. FAILED\n";
			return;
		}
		else {
			$data = str_replace( $src, $dst, $data );
		}
	}
	
	
	
	
	
	file::write( $path,  $data );
	patch_message('patch data saved');
	
	
	
		