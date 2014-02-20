<?php
	if ( empty($sub_domain) ) {
		jsBack("사이트 주소를 입력해 주세요");
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
	else {
		$domain = $sub_domain . '.' . etc::base_domain();
		
		if ( $error_code = ms::create( array('domain'=>$domain, 'title'=>$title) ) ) include module( 'create_fail' );
		else {
			$o = array(
				'id'	=> ms::board_id( $domain ) . '_1',
				'subject'	=> $title,
				'group_id'	=> 'multisite',
				'bo_admin' => $member['mb_id']
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
	}
