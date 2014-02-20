<?php
	if ( empty($sub_domain) ) {
		jsBack("사이트 주소를 입력해 주세요");
		exit;
	}
	if ( strpos($sub_domain, ".")) {
		jsBack('사이트 주소에는 .이 들어갈 수 없습니다.');
		exit;
	}
	
	if ( strlen($sub_domain) > 14 ) {
		echo "
			<script>
				alert('사이트 주소는 영문14자리 이하로 해 주세요.');
				window.history.back();
			</script>
		";
		exit;
	}
	
	if( preg_match("/[\xA1-\xFE\xA1-\xFE]/", $sub_domain) ) {
		jsBack ( "사이트 주소에는 한글을 입력 할 수 없습니다." );
		exit;
	}
	
	if( preg_match("/[!#$%^&*()?+=\/]/", $sub_domain) ) {
		jsBack ( "사이트 주소에는 특수문자를 입력 할 수 없습니다." );
		exit;
	}
	
	if ( empty ( $title ) ) {
		jsBack ( "사이트 제목을 입력해 주세요" );
		exit;
	}

	$domain = $sub_domain . '.' . etc::base_domain();
		
	if ( $error_code = ms::create( array('domain'=>$domain, 'title'=>$title) ) ) include module( 'create_fail' );
	else {
			$o = array(
				'id'	=> ms::board_id( $domain ) . '_1',
				'subject'	=> $title,
				'group_id'	=> 'multisite',
				'bo_admin' => $member['mb_id'],
				'bo_use_dhtml_editor' => 1
			);
			g::board_create($o);
			
			// 사이트 생성시 처음 메뉴 저장
			db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'menu_1', 'value'=>ms::board_id ( $domain ).'_1' ) );
			
			
			if ( $in['site-type'] ) {
				if ( $in['site-type'] == 'community' ) $site_type = 'blog';
				else if ( $in['site-type'] == 'travel' ) 	$site_type = 'blog';
				else if ( $in['site-type'] == 'shopping' ) $site_type = 'blog';
				else if ( $in['site-type'] == 'academy' ) $site_type = 'blog';
				else if ( $in['site-type'] == 'blog' ) $site_type = 'blog';
				else $site_type = 'blog';
			}
			else $site_type = 'blog';
			
			$meta_op = array(
							'domain' => $domain,
							'code'=>'theme',
							'value'=> $site_type
			);
			db::insert('x_multisite_meta', $meta_op );

			$theme = $site_type;
			$priority = 10;
			md::config_update();
			
			include module( 'create_success' );
	}
