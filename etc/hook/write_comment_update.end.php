<?php
	x::hook( 'write_comment_update_end' );

	$domain = etc::domain();
	$content = strip_tags($wr_content);
	if ($w == 'c' ) {
	
	
		$o = array(
			'domain'					=> $domain,
			'bo_table'					=> $bo_table,
			'wr_id'						=> $comment_id,
			'wr_parent'				=> $wr_id,
			'wr_is_comment'		=> 1,
			'wr_comment'			=> $tmp_comment,
			'wr_option'				=> "$wr_secret",
			'ca_name'				=> $wr['ca_name'],
			'wr_subject'				=> '',
			'wr_content'				=> $content,
			'mb_id'						=> $mb_id,
			'wr_name'				=> $wr_name,
			'wr_datetime'			=> G5_TIME_YMDHIS
		);
		
		
		
		x::post_data_insert($o);
		
		
		
		// 원글에 댓글수 증가
		$u = array(
			'bo_table'			=> $bo_table,
			'wr_id'				=> $wr_id,
			'wr_comment'	=> 'wr_comment + 1'
		);
		
		x::post_data_update( $u );
		
		// db::query(" update x_post_data set wr_comment = wr_comment + 1 where bo_table='$bo_table' AND wr_id = '$wr_id' ");

	}
	else if ( $w == 'cu' ) {
		$o = array(
			'bo_table'				=> $bo_table,
			'wr_id'					=> $comment_id,
			'wr_option'			=> "$wr_secret",
			'wr_subject'			=> $wr_subject,
			'wr_content'			=> $wr_content
		);
		x::post_data_update( $o );
	}
