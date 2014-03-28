<?php
	error_reporting( E_ALL ^ E_NOTICE );
	include 'etc/x-standalone.php';
	
	$max = 100;
	$bo_table = $argv[1];
	$domain = $argv[2];
	if ( $argv[3] ) $max = $argv[3];
	
	if ( empty( $bo_table ) || empty( $domain )) {
		echo "
		Pleaes input 'bo_table' as first arguemnt and 'domain' as second argument.
		ex) php etc/test/post.php bo_table www.domain.com
		";
		exit;
	}

	while (@ob_end_flush());
	for ( $i=0; $i < $max; $i ++ ) {
		$o = 
			array(
				'domain'			=> $domain,
				'mb_id'				=> "thruthesky",
				'mb_name'		=> "JaeHo Song",
				'mb_email'		=> "thruthesky@email.com",
				'ca_name'		=> 'ABC - CATEGORY',
				'bo_table'			=> "$bo_table",
				'wr_subject'		=> "Test Post No. $i - This is just a test post.",
				'wr_content'		=> "Content: $i<hr>This is the content<br><h1>Hello there...</h1>How are you?<br>\n\r\nTTTTT\t....How are you?<br>Later..",
				'wr_link_1'		=> "http://philgo.com",
				'wr_link_2'		=> "http://withcenter.com",
				'wr_homepage'	=> "http://jaehosong.com",
				'html'			=> 'html2',
				);
		
		if ( $i >= ( $max - 10 ) ) {
			$n = rand(1, 10);
			$o['file_1'] = "tmp/test-image-$n.jpg";
		}
		
		$wr_id = g::write( $o );
		
		
		/* @todo insert it into post_latst */
	
		echo "$wr_id, ";
		flush();
	}
	
	delete_cache_latest($bo_table);
	

	