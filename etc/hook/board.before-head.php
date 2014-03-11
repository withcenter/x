<?php

	/// hook
	x::hook( 'board_before_head' );
	
	
	if ( empty( $admin_href ) && ms::admin() ) {
		$admin_href = ms::url_config_forum();
	}
	
	
	if ( read_page() ) {
		// 한번 읽은글은 브라우저를 닫기전까지는 카운트를 증가시키지 않음
		$ss_name = 'x_ss_view_'.$bo_table.'_'.$wr_id;
		if ( ! get_session($ss_name) ) {
			g::post_data_update( $bo_table, $wr_id, 'wr_hit', 'wr_hit+1', true );
		}
	}
	
	
	
	
	