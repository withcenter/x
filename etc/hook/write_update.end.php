<?php
	x::hook( 'write_update_end' );

	$domain = etc::domain();
	
	$content = strip_tags($wr_content);
	if ($w == '' || $w == 'r') {
		$sql = " insert into x_post_data
                set 
					domain					= '$domain',
					bo_table					= '$bo_table',
					wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_subject = '$wr_subject',
                     wr_content = '$content',
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '{$member['mb_id']}',
                     wr_name = '$wr_name',
                     wr_datetime = '".G5_TIME_YMDHIS."'
				";
    sql_query($sql);
	
	}
	