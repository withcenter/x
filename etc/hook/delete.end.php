<?php
	x::hook( 'delete_end' );

	// delete post and its comments
	x::post_data_delete_thread( $bo_table, $write['wr_id'] );
	
	