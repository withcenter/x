<?php
	if ( ! admin() ) {
		echo "You are not admin";
		return;
	}


	if ( ms::count_forum() > MS_MAX_FORUM ) {
		jsBack("게시판 생성을 " . MAX_MAX_FORUM . " 개 이상 할 수 없습니다.");
		return;
	}
	
	
	
	$option = array(
					'id'	=> bo_table( x::forum_count() + 1 ),
					'subject'	=> db::addquotes($in['subject']),
					'bo_admin' =>$member['mb_id'],
					'group_id'	=> 'multisite',
					'bo_use_dhtml_editor' => 1,
					'bo_use_list_view' => 1
	);
	
	if ( ms::meta('theme') == 'blog' ) $option['bo_skin'] = 'x/skin/board/x-board-blog';
	
	g::board_create($option);
	jsAlert( "게시판 ".$board_id . "(".$in['subject'].")이 생성 되었습니다." );

	echo "
		<script>
			parent.window.location.reload();
		</script>
	";	