<?php
	for ( $i=1; $i <=6; $i++ ) {
		if ( $in['forum_no_'.$i.'_bo_table'] ) ms::meta('forum_no_'.$i, $in['forum_no_'.$i.'_bo_table']);
		else ms::meta('forum_no_'.$i, $in['forum_no_'.$i] );
	}	
	
	ms::meta('blog_profile_message', $in['blog_profile_message']);

	