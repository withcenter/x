<?
	if ( ! ms::admin() || $is_admin != 'super' ) {
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
	<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multisite/subsite.css' />
	<div class='config_forum'>
		<form class='config_menu' target='hidden_iframe' autocomplete='off'>
			<input type='hidden' name='module' value='multisite' />
			<input type='hidden' name='action' value='config_forum_submit' />
			<input type='hidden' name='no_of_board' value=<?=$no_of_board?> />
			<input class='create-forum-input' type='text' name='subject' placeholder='Input Board name' />
			<input type='submit' value='Create'/>
		</form>
		<div class='no_of_board'>No of board : <b><?=count($rows)?></b></div>
		<div style='clear:right;'></div>
		
		<table class='board_list' cellpadding=0 cellspacing=0 width='100%'>
			<tr class='header'>
				<td width=148>Board ID</td>
				<td width=130>Subject</td>
				<td width=80 align='center'>No Of Post</td>
				<td class='padding-extra1'>Setting</td>
			</tr>
		<?php
		$i = 0;
		foreach ( $rows as $row ) {
			if ( $i % 2 ) $background="background";
			else $background = null;
			$i++;
			echo "
				<tr class='row $background' >
					<td width=148>$row[bo_table]</td>
					<td width=130>$row[bo_subject]</td>
					<td width=80 align='center'>".number_format($row['bo_count_write'])."</td>
					<td class='padding-extra2'>
						<a href='?module=multisite&action=config_forum&mode=forum_setting&bo_table=$row[bo_table]'><img src='".x::url()."/module/multisite/img/setting.png' /></a>
					</td>
				</tr>
			";
		}
		?>
		</table>

		<iframe src='javascript:void(0);' name='hidden_iframe' style='width: 100%; height: 300px; display:none;'></iframe>
	</div>
<?}?>