<?php
	x::hook( 'delete_comment_end' );

	
	
	
	// delete comment
	x::post_data_delete( $bo_table, $comment_id );
	
	// decrease wr_comment on parent
	x::post_data_update( array(
		'bo_table'			=> $bo_table,
		'wr_id'				=> $write['wr_parent'],
		'wr_comment'	=> 'wr_comment - 1'
	) );
	
	