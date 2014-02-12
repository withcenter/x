<? 
	/** display 5 posts from each forum that is selected by the user on Config_Global */
	for ( $i = 1; $i <= 10; $i++ ) { 
		if ( $extra['forum_no_'.$i] != '' ) {
			$option = db::row( "SELECT bo_subject, bo_count_write FROM $g5[board_table] WHERE bo_table='".$extra['forum_no_'.$i]."'" );
			echo latest( "x-latest-blog" , $extra['forum_no_'.$i] , 5 , 25 );
		}
	}


