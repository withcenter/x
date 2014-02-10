<?php


/**
 *  @brief patches jQuery for new version
 *  
 *  @return 0 if success
 *  
 *  @details carefully observe any error on console for the jQuery version change.
 *    
 */
 
	patch_begin(__FILE__);
	$path = $dir_root . '/head.php';
	$data = file::read($path);
	if ( $data == file::FILE_NOT_FOUND ) return $data;
	$dst = "<?include G5_PATH . '/x/html/patch.head-main-menu.php'?>";
	
	
	if ( pattern_exist($data, $dst) ) {
			message('already patched : OK');
	}
	else {
		$src = '<nav id="gnb">';
		if ( pattern_exist($data, $src) ) {
			list ( $a, $b ) = explode( $src, $data );
			list ( $c, $d ) = explode( "</nav>", $b );
			$data = $a . $dst . $d;
			file::write( $path,  $data );
			message('menu patched : OK');	
		}
		else patch_failed();
		
		
	}
	