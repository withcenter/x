<?php
	if ( ! ms::admin() || $is_admin != 'super' ) {
		echo "You are not admin";
		return;
	}
	

	if ( !$no_of_board = $in['no_of_board'] ) $no_of_board = 1;
	
	$board_id = ms::board_id( etc::domain() ) . '_'.++$no_of_board;
	
	$option = array(
					'id'	=> $board_id,
					'subject'	=> db::addquotes($in['subject']),
					'bo_admin' =>$_SESSION['ss_mb_id'],
					'group_id'	=> 'multisite'
	);
	g::board_create($option);
	jsAlert( $board_id . "(".$in['subject'].")has been created." );

	echo "
		<script>
			parent.window.location.reload();
		</script>
	";	