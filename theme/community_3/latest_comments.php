<?
/** LATEST COMMENTS */
$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
$current_date = date('Y-m-d').' 23:59:59';
$previous_date = date('Y-m-d', strtotime("-7 day", strtotime($current_date))).' 00:00:00';
$recent_comments = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime BETWEEN '$previous_date' AND '$current_date' AND wr_id!=wr_parent ORDER BY bn_datetime DESC LIMIT 5" );	
if( $recent_comments ) {
	$i = 0;
	foreach ( $recent_comments as $recent_comment ) {
		$comments_list[$i] = db::row( " SELECT * FROM $g5[write_prefix]". $recent_comment['bo_table']." WHERE wr_id='".$recent_comment['wr_id']."'" );
		$comments_list[$i]['bo_table'] = $recent_comment['bo_table'];
		$i++;
	}
?>

<div class="latest-comments" >
	<div class='title'>
		<table width='100%'>
			<tr valign='top'>
				<td align='left' class='title-left'>
					<img src="<?=x::url_theme()?>/img/latest-comments.png">
					<span class='label'>LATEST COMMENTS</span>
				</td>
			</tr>
		</table>
	</div>

	<div class='latest-comments-items'>
		<table>
		<?php
			$i = 1;
			$no_of_comments = count($comments_list);
			foreach ( $comments_list as $comments_li ) {
				$comments_content = cut_str(strip_tags($comments_li['wr_content']),40,'...');
				$comments_url = g::url().'/bbs/board.php?bo_table='.$comments_li['bo_table'].'&wr_id='.$comments_li['wr_id'];
				$comments_author = $comments_li['mb_id'];
		?>	
			<tr valign='top'>
				<td width='15'>
					<img src='<?=x::url_theme()?>/img/comments-arrow.png'>
				</td>
				<td>
					<a href='<?=$comments_url?>'>	
						<span class='post-content'>
							<?=$comments_content?>
						</span>
					</a>
				</td>
			</tr>
			<?
				$i++;
			}?>
		</table>
	</div>
</div>
<? } ?>

