<?php
	patch_begin(__FILE__);
	$path = $dir_root . '/bbs/write_update.php';
	$data = file::read($path);
	$src = '$msg = array();';
	$dst = '$msg = array();' . "\nx::hook( 'write_update_begin' );";
	
	if ( pattern_exist($data, $dst) ) {
		echo("	already patched\n");
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
	
	$src = '@include_once($board_skin_path.\'/write_update.skin.php\');';
	$dst = "x::hook( 'write_update_end' );\n" . $src;
	
	if ( pattern_exist($data, $dst) ) {
		echo("	already patched\n");
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
	
	
	
		