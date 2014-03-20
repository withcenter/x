<?php
	for ( $i=1; $i <=6; $i++ ) {
		if ( $in['forum_no_'.$i.'_bo_table'] ) meta_set('forum_no_'.$i, $in['forum_no_'.$i.'_bo_table']);
		else meta_set('forum_no_'.$i, $in['forum_no_'.$i] );
	}	
	
	meta_set('profile_message', $in['profile_message']);
	meta_set('banner_1_url', $in['banner_1_url']);
	meta_set('banner_2_url', $in['banner_2_url']);
	meta_set('banner_3_url', $in['banner_3_url']);
	meta_set('banner_4_url', $in['banner_4_url']);
	meta_set('main_no_of_post', $in['main_no_of_post']);
	
	
	
	