<?php
	
	$path = $dir_root . '/tail.sub.php';
	$data = file::read( $path );
	$src = "<?include G5_PATH . '/x/end.php'?>";
	if ( pattern_exist($data, $src) ) {
		patch_message("already patched");
	}
	else {
		$data = "$data\n$src\n";
		file::write( $path, $data );
		patch_message('patched');
	}

	