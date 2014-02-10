<?php
	
	$domain = $sub_domain . '.' . etc::base_domain();
	
	
	if ( $error_code = ms::create( array('domain'=>$domain, 'title'=>$title) ) ) include module( 'create_fail' );
	else {
		$o = array(
			'id'	=> ms::board_id( $domain ) . '_1',
			'subject'	=> $title,
			'group_id'	=> 'multisite',
		);
		g::board_create($o);
		include module( 'create_success' );
	}
