<?php
	if ( ! admin() ) {
		echo "You are not admin";
		return;
	}

	$cnt = $cnt = x::count_forum();
	if ( $cnt > MS_MAX_FORUM ) {
		jsBack("게시판 생성을 " . MAX_MAX_FORUM . " 개 이상 할 수 없습니다.");
		return;
	}
	
	
	$option = array(
					'id'	=> bo_table( $cnt + 1 ),
					'subject'	=> db::addquotes($in['subject']),
					'bo_admin' =>$member['mb_id'],
					'group_id'	=> 'multisite',
					'bo_use_dhtml_editor' =>1,
					'bo_use_list_view' => 1
	);
	
	if ( meta('theme') == 'blog' ) $option['bo_skin'] = 'x/skin/board/x-board-blog';
	
	g::board_create($option);
	jsGo("?module=$module&action=config_forum", "게시판 ".$board_id . "(".$in['subject'].")이 생성 되었습니다." );
	
	