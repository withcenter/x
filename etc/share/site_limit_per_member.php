<?php

	if ( ! login() ) {
		jsBack( ln("Please, login first", "회원 로그인을 하십시오.") );
		exit;
	}
	
	$no = config( "site_create_limit_per_member" );
	
	
	if ( $no != '' ) {
		$site_count = x::site_count( my('id') );
		if ( $site_count >= $no ) {
			jsBack("사이트는 최대 $no 개만 개설 할 수 있습니다.");
			exit;
		}
	}