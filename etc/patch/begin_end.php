<?php

	patch_begin(__FILE__);


	if ( copy('etc/x.php', "$dir_root/extend/x.php") ) {
		message("copy x.php -> extend/x.php OK");
	}
	else patch_failed();
	
	
	
	message("adding begin.php to head.php");
	$path = $dir_root . '/head.php';
	$data = file::read($path);
	$find = "<!-- 상단 시작 { -->";
	$patch = "<?php
	x::hook( 'head_begin' );
	if ( file_exists( x::hook(__FILE__) ) ) {
		include x::hook(__FILE__);
		return;
	}
?>";
	
	if ( pattern_exist( $data, $patch ) ) {
		message(" already patched : OK");
	}
	else {
		if ( pattern_exist( $data, $find ) ) {
			$data = str_replace( $find, "\n$patch\n$find", $data );
			file::write( $path, $data );
			message(" patched : OK");
		}
		else {
			patch_failed();
		}
	}
	
	
	message('adding end.php to tail.php');
	$path = $dir_root . '/tail.php';
	$data = file::read($path);
	$find = "/G5_IS_MOBILE[^>]*>/s";
	$patch = "<?x::hook( 'tail_begin' ); if ( file_exists( x::hook(__FILE__) ) ) { include x::hook(__FILE__); return; } ?>";
	if ( pattern_exist( $data, $patch ) ) {
		message(' already patched : OK');
	}
	else {
		if ( preg_match($find, $data, $ms) ) {
			//di($ms[0]);
			$data = str_replace($ms[0], "$ms[0]\n$patch\n", $data);
			file::write( $path, $data );
			message(" patched : OK");
		}
		else patch_failed();
	}
	
	
	
	
	message("adding end.php to tail.sub.php");
	$path = $dir_root . '/tail.sub.php';
	$data = file::read( $path );
	$src = "<?include G5_PATH . '/x/end.php'?>";
	if ( pattern_exist($data, $src) ) {
		message(" already patched : OK");
	}
	else {
		$data = "$data\n$src\n";
		file::write( $path, $data );
		message(" patched : OK");
	}

	