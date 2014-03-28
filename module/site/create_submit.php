<?php
	include x::dir() . '/etc/share/site_limit_per_member.php';

	add_stylesheet("<link rel='stylesheet' type='text/css' href='".x::url()."/module/".$module."/site.css' />");
	
	

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
	
	
	
	
	
	
	if ( empty ( $in['title'] ) ) {
		jsBack ( "사이트 제목을 입력해 주세요" );
		exit;
	}

	if ( $in['site-type'] ) {
		if ( $in['site-type'] == 'community' ) $site_type = 'community_3';
		else if ( $in['site-type'] == 'travel' ) $site_type = 'travel_theme_2';
		else if ( $in['site-type'] == 'blog' ) $site_type = 'blog';
		else if ( $in['site-type'] == 'gallery1' ) $site_type = 'gallery_1';
		else if ( $in['site-type'] == 'gallery2' ) $site_type = 'gallery_2';
		else $site_type = 'blog';
	}
	else $site_type = 'blog';
	
	$domain = $sub_domain . '.' . etc::base_domain();
	$domain = strtolower( $domain );
	
	if ( $error_code = x::site_create( array('domain'=>$domain, 'title'=>addslashes($in['title'])) ) ) include module( 'create_fail' );
	else {
			$o = array(
				'id'	=> x::board_id( $domain ) . '_1',
				'subject'	=> "메뉴1",
				'group_id'	=> 'multisite',
				'bo_admin' => $member['mb_id'],
				'bo_use_dhtml_editor' => 1,
				'bo_use_list_view' => 1
			);
			
			if ( $site_type == 'blog' ) $o['bo_skin'] = 'x/skin/board/x-board-blog';
			else if ( $site_type == 'travel_theme_2' )  $o['bo_skin'] = 'x/skin/board/x-board-travel-3';
			else $o['bo_skin'] = 'x/skin/board/multi';
			
			g::board_create($o);
			
			
			x::meta_set( $domain, "menu1bo_table", x::board_id ( $domain ).'_1' );
			x::meta_set( $domain, 'forum_no_1', x::board_id ( $domain ).'_1' );
			
			// 모바일 테마 Default로 mobile-community-1를 선택 되도록 한다.
			x::meta( $domain, 'mobile_theme', 'mobile-community-1');
			
			// 테마에 따라 각각 더 추가 생성 되는 게시판 및 메뉴
			if ( $site_type != 'blog' ) {
				
				for ( $i = 2; $i <= 10; $i++ ) {
					$o = array(
						'id'	=> x::board_id( $domain ) . '_'.$i,
						'subject'	=> "메뉴".$i,
						'group_id'	=> 'multisite',
						'bo_admin' => $member['mb_id'],
						'bo_use_dhtml_editor' => 1,
						'bo_use_list_view' => 1
					);
					
					if ( $site_type == 'travel_theme_2'){
						if ( $i == 2 || $i == 3 ) {
							$o['bo_skin'] = 'x/skin/board/x-board-travel-3';
						}
						else $o['bo_skin'] = 'x/skin/board/multi';
					}
					else {
						$o['bo_skin'] = 'x/skin/board/multi';
					}
					g::board_create($o);
					// 사이트 생성시 메뉴 저장
					if ( $i <= 5 ) x::meta_set( $domain, "menu{$i}bo_table", x::board_id ( $domain ).'_'.$i);

				}
			}
		
			x::meta_set( $domain, 'theme', $site_type );
			
			include module( 'create_success' );
	}
?>
</html>