<?php

	///
	 x::hook( "latest_after_skin_info" ); if ( $error_hook_latest < 0 ) return "No post on $bo_table";
	 
	/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.2jz9ybhuk887
	$code = x::skin_code( $global_skin_dir, $bo_table );
	if ( $v = x::config( "bo_table.$code" ) ) $bo_table = $v;				/// @warning the value of $bo_table has changed here. use $global_bo_table if you need the original value.
	
	
	
	
	
	
	// global $global_skin_dir, $latest_skin_path, $latest_skin_url;
	
	
	
	$path = x::dir() . "/skin/latest/" . $skin_dir;
	if ( file_exists( $path ) ) {
		$latest_skin_path = $path;
		$latest_skin_url = x::url() . "/skin/latest/" . $skin_dir;
	}
	
	//dlog("global_skin_dir: $global_skin_dir");
	//dlog("latest_skin_path: $latest_skin_path");
	//dlog("latest_skin_url: $latest_skin_url");