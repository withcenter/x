<?php
	x::hook( 'good_end' );
	
	
	$o = array(
		'bo_table'			=> $bo_table,
		'wr_id'				=> $wr_id,
		"wr_$good"		=> "wr_$good + 1"
	);
	x::post_data_update( $o );
	
