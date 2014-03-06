<?php

	/// hook
	x::hook( 'latest_before_skin' );
	
	/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.2jz9ybhuk887
	$code = x::skin_code( $global_skin_dir, $global_bo_table );				/// must use $global_bo_table instead of $bo_table.
	if ( $v = x::config( "bo_subject.$code" ) ) $bo_subject = $v;

	
	
	
	$options['no'] = x::config( "no.$code" );
	if ( empty($options['no']) ) $options['no'] = $rows;
	$json = json_decode( x::config( "option.$code"), true );
	if ( $json ) {
		foreach ( $json as $k => $v ) {
			$options[ $k ] = $v;
		}
	}
	
	