<?php
	x::hook( 'latest_begin' );
	global $error_hook_latest, $global_skin_dir, $global_bo_table, $latest_skin_path, $latest_skin_url, $content;
	$global_skin_dir=$skin_dir;
	$global_bo_table=$bo_table;
	
	
	/**
	 * @warning $skin_dir is overwrriten by this code. So to get the original skin folder name, you have use $global_skin_dir.
	 *
	 */
	$code = x::skin_code( $global_skin_dir, $bo_table );
	if ( $v = x::config( "skin.$code" ) ) $skin_dir = $v;
	
	dlog("skin change: $skin_dir");
	
	