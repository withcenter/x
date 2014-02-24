<?php
	$path = $dir_root . '/bbs/delete.php';
	$data = file::read($path);
	$src = "include_once('./_common.php');";
	$dst = $src . "\nx::hook( 'delete_begin' );";
	
	if ( pattern_exist($data, $dst) ) {
		patch_message('already patched');
	}
	else {
		if ( ! pattern_exist($data, $src) ) {
			echo " srouce pattern does not exist. FAILED\n[ source patttern ] : $src";
			return;
		}
		else {
			$data = str_replace( $src, $dst, $data );
			patch_message('patched');
		}
	}
	
	$src = '@include_once($board_skin_path.\'/delete.tail.skin.php\');';
	$dst = "x::hook( 'delete_end' );\n" . $src;
	
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
			echo " patched";
		}
	}
	
	
	
	file::write( $path,  $data );
	
	patch_message('patched');
	