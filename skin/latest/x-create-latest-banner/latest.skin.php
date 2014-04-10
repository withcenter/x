<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>
<div class='latest_banner'>
<?php
	if ( $list ) {	
		$count = 1;
		$total_list_items = 7 - 1;
		for( $i = 0; $i < $total_list_items; $i+=2 ) {
?>					
		<?											
			$imgsrc_upper = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 242.5, 230);
			$imgsrc_lower = get_list_thumbnail($bo_table, $list[$i+1]['wr_id'], 242.5, 230);
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
		<div class = 'image_group'>
			<div class='image_wrapper'>
				<a href=<?=$list[$i]['href']?>><img src='<?=$imgsrc_upper['src']?>'/></a>
				<div class='caption <?=$no_image_upper?>'>
					<div class='inner'>
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
						<a class='subject' href='<?=$url?>'><?=$subject?></a>
						<a class='content' href='<?=$url?>'><?=$content?></a>
					</div>
				</div>
			</div>
			
			<div class='image_wrapper'>
				<a href=<?=$list[$i+1]['href']?>><img src='<?=$imgsrc_lower['src']?>'/></a>
				<div class='caption <?=$no_image_lower?> last'>
					<div class='inner'>
						<?
							if( $list[$i+1]['subject'] ) {
								$subject = $list[$i+1]['subject'];
								$url = $list[$i+1]['href'];
							}
							else {
								$subject = 'This page is empty.';
								$url = "javascript:void(0)";
							}
							
							if( $list[$i+1]['wr_content'] ) $content = cut_str( strip_tags( $list[$i]['wr_content'] ),$upper_content_length,"..." );
							else $content = 'No Content.';
						?>
						<a class='subject' href='<?=$url?>'><?=$subject?></a>
						<a class='content' href='<?=$url?>'><?=$content?></a>
					</div>
				</div>
			</div>
		</div>
	<?		
		}
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
		<div class = 'image_group'>
			<div class='image_wrapper'>
				<a href=<?=$list[$total_list_items]['href']?>><img src='<?=$imgsrc_last['src']?>'/></a>
				<div class='caption <?=$no_image_last?>'>
					<div class='inner'>
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
						<a class='subject' href='<?=$url?>'><?=$subject?></a>
						<a class='content' href='<?=$url?>'><?=$content?></a>
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