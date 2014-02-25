<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<? if( $list ) { ?>
<div class="posts" >
	<div class='title'>
		<table width='100%'>
			<tr valign='top'>
				<td align='left' class='title-left'>
					<div><img src="<?=$latest_skin_url?>/img/recent-posts.png"></div>
					<div class='label'><?=$bo_subject?></div>
				</td>
				<td align='right'>
					<div class='posts-more'><a href="<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>" target='_blank'>more <img src="<?=$latest_skin_url?>/img/more-icon.png"></a></div>
				</td>
			</tr>
		</table>
	</div>
	<div class='posts-items-with-image'>
	<?php
		$count = 1;
		foreach ( $list as $li ) {
			if( !$li['wr_subject'] == '' ) {
				if( !$li['file']['count'] == 0 ) { /**checks if there is a file on the post */
						$li['file']['meta'] = db::rows("SELECT * FROM $g5[board_file_table] WHERE bo_table='$bo_table' AND wr_id='".$li['wr_id']."'");
						$li['file']['path'] = G5_URL.'/'.G5_DATA_DIR.'/file/'.$bo_table.'/';
						
						for( $ctr = 0; $ctr <= $li['file']['count']; $ctr++ ){
							if( $li['file']['meta'][$ctr]['bf_file'] ){
								$has_image = $li['file']['meta'][$ctr]['bf_file'];
								break;
							}
						}
					}
					else $has_image = null;
				}
		
		$subject = conv_subject($li['wr_subject'], 18, "...");
		$content = cut_str( strip_tags($li['wr_content']) ,30,'...');
		$url = $li['href'];
		$no_comment = '';
		if ( !$comment_count = $li['comment_cnt'] ) {
			$comment_count = 0;
			$no_comment = 'no-comment';
		}
	?>	
		<table width='100%'>
			<tr valign='top'>
				<td width='60px'>
					<div class='posts-image'>					
					<?
						if ( $has_image) {							
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 60, 60);							
						}
						else $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';	
						$img = "<img src='$imgsrc[src]'/>";						
						echo "<div class='img-wrapper'>	<a href='$url?' target='_blank'>".$img."</a></div>";
					?>
					</div>	
				</td>
				<td align='left'>
					<div class='posts-info'>
						<a href='<?=$url?>' target='_blank'>
							<span class='subject'><?=$subject?>: </span>
							<span class='content'><?=$content?><span class='no-of-comments <?=$no_comment?>'><?='('.$comment_count.')'?></span></span>
						</a>
					</div>
				</td>
			</tr>
		</table>
	<?}?>
	</div>
</div>
<? } ?>

