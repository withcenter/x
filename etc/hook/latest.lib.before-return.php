<?php

	/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.2jz9ybhuk887
	$code = x::skin_code( $skin_dir, $global_bo_table );				/// must use $global_bo_table instead of $bo_table.
	if ( $v = x::config( "css.$code" ) ) {
		$content = "$content
		<style>
		$v
		</style>
		";
	}
	

	
	
	
	