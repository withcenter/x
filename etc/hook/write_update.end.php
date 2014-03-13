<?php
	x::hook( 'write_update_end' );
	$domain = etc::domain();
	$content = strip_tags($wr_content);
	if ($w == '' || $w == 'r') {
		$o = array(
			'domain'					=> $domain,
			'bo_table'					=> $bo_table,
			'wr_id'						=> $wr_id,
			'wr_parent'				=> $wr_id,
			'wr_option'				=> "$html,$secret,$mail",
			'ca_name'				=> $ca_name,
			'wr_subject'				=> $wr_subject,
			'wr_content'				=> $content,
			'mb_id'						=> $member['mb_id'],
			'wr_name'				=> $wr_name,
			'wr_datetime'			=> G5_TIME_YMDHIS
		);
		x::post_data_insert($o);
	}
	else if ( $w = 'u' ) {
		$o = array(
			'bo_table'					=> $bo_table,
			'wr_id'						=> $wr['wr_id'],
			'wr_option'				=> "$html,$secret,$mail",
			'ca_name'				=> $ca_name,
			'wr_subject'				=> $wr_subject,
			'wr_content'				=> $content,
			'mb_id'						=> $member['mb_id'],
			'wr_name'				=> $wr_name
		);
		x::post_data_update( $o );
	}
	
