<?php

	if ( empty($sub_domain) ) {
		jsBack("사이트 주소를 입력해 주세요");
		exit;
	}
	if ( strpos($sub_domain, ".") || !str_replace('.', '', $sub_domain) ) {
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
	
	
	
	if( preg_match("/^[0-9a-zA-Z]+$/", $sub_domain) ) {
	}
	else {
		jsBack ( "사이트 주소에는 한글 및 특수 문자를 입력 할 수 없습니다." );
		exit;
	}
	
	
	
	
	
	
	
	if ( empty ( $title ) ) {
		jsBack ( "사이트 제목을 입력해 주세요" );
		exit;
	}

	if ( $in['site-type'] ) {
		if ( $in['site-type'] == 'community' ) $site_type = 'community_3';
		else if ( $in['site-type'] == 'travel' ) 	$site_type = 'travel_theme_2';
		else if ( $in['site-type'] == 'shopping' ) $site_type = 'community';
		else if ( $in['site-type'] == 'academy' ) $site_type = 'community_2';
		else if ( $in['site-type'] == 'blog' ) $site_type = 'blog';
		else $site_type = 'blog';
	}
	else $site_type = 'blog';
	
	$domain = $sub_domain . '.' . etc::base_domain();
		
	if ( $error_code = ms::create( array('domain'=>$domain, 'title'=>$title) ) ) include module( 'create_fail' );
	else {
			$o = array(
				'id'	=> ms::board_id( $domain ) . '_1',
				'subject'	=> "메뉴1",
				'group_id'	=> 'multisite',
				'bo_admin' => $member['mb_id'],
				'bo_use_dhtml_editor' => 1
			);
			
			if ( $site_type == 'blog' ) $o['bo_skin'] = 'x/skin/board/x-board-blog';
			else if ( $site_type == 'travel_theme_1' )  $o['bo_skin'] = 'x/skin/board/x-board-travel-3';
			g::board_create($o);
			
			// 사이트 생성시 처음 메뉴 저장
			//db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'menu_1', 'value'=>ms::board_id ( $domain ).'_1' ) );
			//db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'forum_no_1', 'value'=>ms::board_id ( $domain ).'_1' ) ); 
			ms::meta( $domain, 'menu_1', ms::board_id ( $domain ).'_1' );
			ms::meta( $domain, 'forum_no_1', ms::board_id ( $domain ).'_1' );
			
			// 테마에 따라 각각 더 추가 생성 되는 게시판 및 메뉴
			if ( $site_type == 'travel_theme_1' || $site_type == 'community_2' || $site_type == 'community_3' ) {
				
				for ( $i = 2; $i <= 6; $i++ ) {
					$o = array(
						'id'	=> ms::board_id( $domain ) . '_'.$i,
						'subject'	=> "메뉴".$i,
						'group_id'	=> 'multisite',
						'bo_admin' => $member['mb_id'],
						'bo_use_dhtml_editor' => 1
					);
					
					if ( $site_type == 'travel_theme_1'){
						if ( $i == 2 || $i == 3 ) {
							$o['bo_skin'] = 'x/skin/board/x-board-travel-3';
						}
					}
					
					g::board_create($o);
					// 사이트 생성시 메뉴 저장
					if ( $i <= 5 ) db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'menu_'.$i, 'value'=>ms::board_id ( $domain ).'_'.$i ) );
					db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'forum_no_'.$i, 'value'=>ms::board_id ( $domain ).'_'.$i ) );
				}
			}
			
			if (  $site_type == 'travel_theme_2' || $site_type == 'community' ) {
				
				for ( $i = 2; $i <= 10; $i++ ) {
					$o = array(
						'id'	=> ms::board_id( $domain ) . '_'.$i,
						'subject'	=> "메뉴".$i,
						'group_id'	=> 'multisite',
						'bo_admin' => $member['mb_id'],
						'bo_use_dhtml_editor' => 1
					);
					g::board_create($o);
					// 사이트 생성시 메뉴 저장
					if ( $i <= 5 ) db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'menu_'.$i, 'value'=>ms::board_id ( $domain ).'_'.$i ) );
					db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>'forum_no_'.$i, 'value'=>ms::board_id ( $domain ).'_'.$i ) );
				}
			}
			
			/**
			 * @bug This is a data integrity violation.
			 * Theme value is set on both of x_multidomain_config and x_multisite_meta and it will cause problem in the future.
			
			*/
			/*
			$meta_op = array(
							'domain' => $domain,
							'code'=>'theme',
							'value'=> $site_type
			);
			db::insert('x_multisite_meta', $meta_op );
			*/
			ms::meta( $domain, 'theme', $site_type );
			/*
			$theme = $site_type;
			$priority = 10;
			md::config_update();
			*/
			include module( 'create_success' );
	}
?>
</html>