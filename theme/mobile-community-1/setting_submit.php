<?php
	x::meta('mobile_contact_num', $in['mobile_contact_num']);
	
	for ( $i=1; $i <=10; $i++ ) {
	x::meta('popular_forum_no_'.$i, $in['popular_forum_no_'.$i] );
	x::meta('latest_forum_no_'.$i, $in['latest_forum_no_'.$i] );
	x::meta('popular_no_of_posts_'.$i, $in['popular_no_of_posts_'.$i] );
	x::meta('latest_no_of_posts_'.$i, $in['latest_no_of_posts_'.$i] );	
}	