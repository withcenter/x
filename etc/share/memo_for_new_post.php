<?php

	if ($w == '' || $w == 'r') {
		$msg_header = "새 글이 등록되었습니다.";
	}
	else if ( $w = 'u' ) {
		$msg_header = "글이 수정되었습니다.";
	}
	else if ($w == 'c' ) {
		$msg_header = "새 코멘트가 등록되었습니다.";
	}
	else if ( $w == 'cu' ) {
		$msg_header = "코멘트가 수정되었습니다.";
	}
	
	$send_to = array();
	if ( x::$config['global']['memo_new_post_to_admin'] == 'Y' ) {
		if ( my('id') != 'admin' ) $send_to[] = 'admin';
	}
	
	if ( $comment_id && x::$config['global']['memo_new_post_to_member'] == 'Y' ) {
		$rows = g::post_parents( $bo_table, $comment_id, 'wr_id, mb_id' );
		if ( $rows ) {
			foreach ( $rows as $row ) {
				$send_to[] = $row['mb_id'];
			}
		}
	}
	
	$send_to = array_unique($send_to);
	
	
	if ( $send_to ) {
		foreach ( $send_to as $to ) {
			if ( $to == my('id') ) continue;
			$url = url_forum_view( $bo_table, $wr_id, $comment_id );
			if ( $comment_id ) $extra_subject = "부모 글";
			$content = "
				$msg_header
				
				$extra_subject 제목 : $wr_subject
				
				링크 : $url
				
			";
			if ( empty($member['mb_id']) ) $from = 'admin';
			else $from = $member['mb_id'];
			g::memo_send(
				array(
					'from'		=> $from,
					'to'			=> $to,
					'content'	=> $content,
				)
			);
		}
	}
	
