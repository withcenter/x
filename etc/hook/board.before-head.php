<?php

	/// hook
	x::hook( 'board_before_head' );
	
	
	if ( empty( $admin_href ) && ms::admin() ) {
		$admin_href = ms::url_config_forum();
	}
	