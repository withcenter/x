<?php
	x::hook( 'outlogin' );

	
	
	$path = x::dir() . "/skin/outlogin/" . $skin_dir;
	
	if ( file_exists( $path ) ) {
		$outlogin_skin_path = $path;
		$outlogin_skin_url = x::url() . "/skin/outlogin/" . $skin_dir;
	}
