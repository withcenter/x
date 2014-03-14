<?php
	if ( ! login() ) return jsBack( ln("Please, login first", "회원 로그인을 하십시오.") );
	if ( empty($sub_domain) ) return jsBack("사이트 주소를 입력해 주세요");
	if ( strpos($sub_domain, ".") || !str_replace('.', '', $sub_domain) ) return jsBack('사이트 주소에는 .이 들어갈 수 없습니다.');
	if ( strlen($sub_domain) > 14 ) return jsBack('사이트 주소는 영문14자리 이하로 해 주세요.');
	if ( ! preg_match("/^[0-9a-zA-Z]+$/", $sub_domain) ) return jsBack ( "사이트 주소에는 한글 및 특수 문자를 입력 할 수 없습니다." );
	if ( empty ( $title ) ) return jsBack ( "사이트 제목을 입력해 주세요" );
	
	$domain = $sub_domain . '.' . etc::base_domain();
	if ( $error_code = x::site_create( array('domain'=>$domain, 'title'=>addslashes($in['title'])) ) ) return jsBack("해당 사이트가 이미 존재합니다. 다른 도메인을 입력하십시오.");
	
	meta( $domain, 'theme', 'community_3');
	x::meta( $domain, 'mobile_theme', 'mobile-community-1');
	
	$o = array(
				'subject'	=> "메뉴1",
				'group_id'	=> 'multisite',
				'bo_admin' => my('id'),
				'bo_use_dhtml_editor' => 1,
				'bo_use_list_view' => 1,
				'bo_skin'			=> 'multi',
			);
	for ( $i=1; $i<=5; $i++ ) {
		$o['id']	= bo_table( $i, $domain );
		g::board_create($o);
		x::meta( $domain, "menu{$i}bo_table", bo_table( $i, $domain ) );
	}
	
	jsGo( url_site_admin( $domain ) );
