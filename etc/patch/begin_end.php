<?php

	patch_begin(__FILE__);


	if ( copy('etc/x.php', "$dir_root/extend/x.php") ) {
		echo "	copy x.php -> extend/x.php OK\n";
	}
	else patch_failed();
	
	
	
	echo "			adding begin.php to head.php	";
	
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
		echo " already patched : OK\n";
	}
	else {
		if ( pattern_exist( $data, $find ) ) {
			$data = str_replace( $find, "\n$patch\n$find", $data );
			file::write( $path, $data );
			echo " patched : OK";
		}
		else {
			patch_failed();
		}
	}
	
	
	echo "			adding x/end.php to G5_PATH/tail.php";
	$path = $dir_root . '/tail.php';
	$data = file::read($path);
	$find = "/G5_IS_MOBILE[^>]*>/s";
	$patch = "
		<?php
			x::hook( 'tail_begin' );
			if ( file_exists( x::hook(__FILE__) ) ) {
				include x::hook(__FILE__);
				include_once(G5_PATH.'/tail.sub.php');
				return;
			}
		?>
	";
	if ( pattern_exist( $data, $patch ) ) {
		echo " already patched : OK\n";
	}
	else {
		if ( preg_match($find, $data, $ms) ) {
			//di($ms[0]);
			$data = str_replace($ms[0], "$ms[0]\n$patch\n", $data);
			file::write( $path, $data );
			echo " patched : OK\n";
		}
		else patch_failed();
	}
	
	
	
	
	echo "			adding x/end.php to G5_PATH/tail.sub.php";
	$path = $dir_root . '/tail.sub.php';
	$data = file::read( $path );
	$src = "<?include G5_PATH . '/x/end.php'?>";
	if ( pattern_exist($data, $src) ) {
		echo " already patched : OK\n";
	}
	else {
		$data = "$data\n$src\n";
		file::write( $path, $data );
		echo " patched : OK\n";
	}

	