<?
include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 
/** POSTS RECENT */
$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
$current_date = date('Y-m-d').' 23:59:59';
$previous_date = date('Y-m-d', strtotime("-7 day", strtotime($current_date))).' 00:00:00';
$latest_rows = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime BETWEEN '$previous_date' AND '$current_date' AND wr_id=wr_parent ORDER BY bn_datetime DESC LIMIT 3" );	
if( $latest_rows ) {
	$i = 0;
	foreach ( $latest_rows as $latest_row ) {
		$latest_list[$i] = db::row( " SELECT * FROM $g5[write_prefix]".$latest_row['bo_table']." WHERE wr_id='".$latest_row['wr_id']."'" );
		$latest_list[$i]['bo_table'] = $latest_row['bo_table'];
		$i++;
	}
 }?>
<div class="com3-latest-posts" >
		<div class='title'>
			<table width='100%'>
				<tr valign='top'>
					<td align='left' class='title-left'>
						<img src="<?=x::url_theme()?>/img/3line.png">
						<span class='label'>최근 작성글</span>
					</td>
				</tr>
			</table>
		</div>

	<div class='com3-latest-posts-items'>
		<table cellpadding=0 cellspacing=0>
		<?php
			if ( $latest_list ) {
			$i = 1;
			$ctr = count($latest_list);
			foreach ( $latest_list as $latest_li ) {
				$latest_subject = conv_subject($latest_li['wr_subject'],15, '...' );

				$latest_url = g::url().'/bbs/board.php?bo_table='.$latest_li['bo_table'].'&wr_id='.$latest_li['wr_id'];
				$latest_comment_count = '['.strip_tags($latest_li['wr_comment']).']';
				if ( $latest_comment_count == 0 ) $no_comment = 'no-comment';
				else $no_comment = '';
				$latest_img = get_list_thumbnail( $latest_li['bo_table'] , $latest_li['wr_id'], 38, 38);
				if ( !$latest_img ) $img = x::url_theme().'/img/no-image.png';
				else $img = $latest_img['src'];
				if( $i == $ctr ) $last_post = "class='last-item'";
				else $last_post = '';
		?>	
				<tr <?=$last_post?> valign='top'>
					<td width='40'>
						<div class='post-image'><a href='<?=$img?>' target='_blank'><img src='<?=$img?>'></a></div>
					</td>
					<td width='110'>
						<div class='subject'><a href='<?=$url?>'><?=$latest_subject?></a></div>
					</td>
					<td width='40' align='right'>
						<span class='num_comments'><?=$latest_comment_count?></span>
					</td>
				</tr>
		<? $i++; 
			}
		}
		else echo "<tr valign='top'><td>최신글이 없습니다.</td></tr>";
	?>
		</table>
	</div>
</div> <!--posts--recent-->
