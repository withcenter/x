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
			'wr_datetime'			=> G5_TIME_YMDHIS,
			
						'wr_link1'					=> $wr_link1,//
			'wr_link2'					=> $wr_link2,//
			'wr_password'			=> $wr_password,//
			'wr_name'				=> $wr_name,
			'wr_email'				=> $wr_email,
			'wr_home_page'		=> $wr_homepage,
			'wr_ip'						=> $_SERVER['REMOTE_ADDR'],
			'wr_1'						=> $wr_1,
                     'wr_2' => $wr_2,
                     'wr_3' => $wr_3,
                     'wr_4' => $wr_4,
                     'wr_5' => $wr_5,
                     'wr_6' => $wr_6,
                     'wr_7' => $wr_7,
                     'wr_8' => $wr_8,
                     'wr_9' => $wr_9,
                    ' wr_10' =>$wr_10,
			
			'wr_file'					=> $row['cnt'],
		
					
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
			'wr_name'				=> $wr_name,
						'wr_link1'					=> $wr_link1,//
			'wr_link2'					=> $wr_link2,//
			'wr_password'			=> $wr_password,//
			'wr_name'				=> $wr_name,
			'wr_email'				=> $wr_email,
			'wr_home_page'		=> $wr_homepage,
			'wr_ip'						=> $_SERVER['REMOTE_ADDR'],
			'wr_1'						=> $wr_1,
                     'wr_2' => $wr_2,
                     'wr_3' => $wr_3,
                     'wr_4' => $wr_4,
                     'wr_5' => $wr_5,
                     'wr_6' => $wr_6,
                     'wr_7' => $wr_7,
                     'wr_8' => $wr_8,
                     'wr_9' => $wr_9,
                    ' wr_10' => $wr_10,
			
			'wr_file'					=> $row['cnt'],
					
		);
		
		
		x::post_data_update( $o );
	}
	
