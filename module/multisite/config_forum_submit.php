<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}


	if ( ms::count_forum() > MS_MAX_FORUM ) {
		jsBack("게시판 생성을 " . MAX_MAX_FORUM . " 개 이상 할 수 없습니다.");
		return;
	}
	if ( !$no_of_board = $in['no_of_board'] ) $no_of_board = 1;
	
	$board_id = ms::board_id( etc::domain() ) . '_'.++$no_of_board;
	
	$option = array(
					'id'	=> $board_id,
					'subject'	=> db::addquotes($in['subject']),
					'bo_admin' =>$member['mb_id'],
					'group_id'	=> 'multisite',
					'bo_use_dhtml_editor' => 1
	);
	
	if ( ms::meta('theme') == 'blog' ) $option['bo_skin'] = 'x/skin/board/x-board-blog';
	
	@g::board_create($option);
	jsAlert( "게시판 ".$board_id . "(".$in['subject'].")이 생성 되었습니다." );

	echo "
		<script>
			parent.window.location.reload();
		</script>
	";	