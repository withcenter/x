<?php

	///
	 x::hook( "latest" ); if ( $error_hook_latest < 0 ) return "No post on $bo_table";
	 
	/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.2jz9ybhuk887
	$code = x::skin_code( $skin_dir, $bo_table );
	if ( $v = x::config( "bo_table.$code" ) ) $bo_table = $v;				/// @warning the value of $bo_table has changed here. use $global_bo_table if you need the original value.
	
	
	
	