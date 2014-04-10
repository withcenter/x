<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>
<div class='latest_banner'>
	<div class='image_group left'>
<?php
	if ( $list ) {	
		$count = 1;
		$total_list_items = 7 - 1;
		for( $i = 0; $i < $total_list_items; $i++ ) {
?>					
		<?											
			$imgsrc_upper = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 485, 460);
			$imgsrc_lower = get_list_thumbnail($bo_table, $list[$i+1]['wr_id'],485, 460);
			if ( empty($imgsrc_upper['src']) ){
				$imgsrc_upper['src'] = $latest_skin_url.'/img/no_image_1.png';				
				$no_image_upper = 'no_image';
				$upper_content_length = 150;
			} else {
				$no_image_upper = null;
				$upper_content_length = 80;
			}
			
			if ( empty($imgsrc_lower['src']) ){
				$imgsrc_lower['src'] = $latest_skin_url.'/img/no_image_1.png';
				$no_image_lower = 'no_image';
				$lower_content_length = 150;
			} else {
				$no_image_lower = null;
				$lower_content_length = 80;
			}
			
		?>
			<div class='image_wrapper item_no_<?=$count?>'>
				<?
					if( $list[$i]['subject'] ) {
						$subject = $list[$i]['subject'];
						$url = $list[$i]['href'];
					}
					else {
						$subject = 'This page is empty.';
						$url = "javascript:void(0)";
					}
					
					if( $list[$i]['wr_content'] ) $content = cut_str( strip_tags( $list[$i]['wr_content'] ),$upper_content_length,"..." );
					else $content = 'No Content.';
				?>
				<a class = 'hidden_anchor' href = '<?=$url?>'></a>
				
				<img src='<?=$imgsrc_upper['src']?>'/>
				<div class='caption <?=$no_image_upper?>'>
					<div class='inner'>						
						<div class='subject'><?=$subject?></div>
						<div class='content'><?=$content?></div>
					</div>
				</div>
			</div>
	<?	
		$count++;
		}
		?>
	</div>	
	<?
		$imgsrc_last = get_list_thumbnail($bo_table, $list[$total_list_items]['wr_id'], 242.5, 460);
		if ( empty($imgsrc_last['src']) ){
			$imgsrc_last['src'] = $latest_skin_url.'/img/no_image_2.png';
			$no_image_last = 'no_image';
			$last_content_length = 150;
		} else {
			$no_image_last = null;
			$last_content_length = 80;
		}
	?>
		<div class = 'image_group right'>
			<div class='image_wrapper'>
				<?
					if( $list[$total_list_items]['subject'] ) {
						$subject = $list[$total_list_items]['subject'];
						$url = $list[$total_list_items]['href'];
					}
					else {
						$subject = 'This page is empty.';
						$url = "javascript:void(0)";
					}
					
					if( $list[$total_list_items]['wr_content'] ) $content = cut_str( strip_tags( $list[$total_list_items]['wr_content'] ),$upper_content_length,"..." );
					else $content = 'No Content.';
				?>
				<a class = 'hidden_anchor' href = '<?=$url?>'></a>
				<img src='<?=$imgsrc_last['src']?>'/>
				<div class='caption <?=$no_image_last?>'>
					<div class='inner'>
						<div class='subject'><?=$subject?></div>
						<div class='content'><?=$content?></div>
					</div>
				</div>
			</div>
		</div>
	<?
	}
	else {
		
	}	
?>
	<div style='clear:both'></div>
</div>