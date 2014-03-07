<?php

	/// hook
	x::hook( 'visit_before_skin' );
	
	$value = x::config( "visit." . etc::domain() );
	$visit = unserialize( $value );

	
	
	
	$path = x::dir() . "/skin/visit/" . $skin_dir;
	
	if ( file_exists( $path ) ) {
		$visit_skin_path = $path;
		$visit_skin_url = x::url() . "/skin/visit/" . $skin_dir;
	}
	