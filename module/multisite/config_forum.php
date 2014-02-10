<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	if ( $in['mode'] == 'forum_setting' ) include_once x::dir() . '/module/multisite/forum_setting.php';
	else {
			/* 생성된 게시판 정보를 가저온다 */
			$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
			
			$q = "SELECT bo_table, bo_subject, bo_count_write FROM $g5[board_table] WHERE $qb";
			
			$rows = db::rows( $q );
			
			$no_of_board = count($rows);
		?>
		
		<div class='no_of_board'>No of board : <b><?=count($rows)?></b></div>
		<form class='config_menu' target='hidden_iframe' autocomplete='off'>
			<input type='hidden' name='module' value='multisite' />
			<input type='hidden' name='action' value='config_forum_submit' />
			<input type='hidden' name='no_of_board' value=<?=$no_of_board?> />
			<input type='text' name='subject' placeholder='Input Board name' />
			<input type='submit' value='Create'/>
		</form>

		<table class='board_list' cellpadding=0 cellspacing=0>
			<tr class='header'>
				<td>Board ID</td>
				<td>Subject</td>
				<td>No Of Post</td>
				<td></td>
			</tr>
		<?php
		foreach ( $rows as $row ) {
			echo "
				<tr>
					<td>$row[bo_table]</td>
					<td>$row[bo_subject]</td>
					<td align='center'>".number_format($row['bo_count_write'])."</td>
					<td>
						<a  class='button' href='?module=multisite&action=config_forum&mode=forum_setting&bo_table=$row[bo_table]'>Setting</a>
					</td>
				</tr>
			";
		}
		?>
		</table>

		<iframe src='javascript:void(0);' name='hidden_iframe' style='width: 100%; height: 300px; display:none;'></iframe>
<?}?>