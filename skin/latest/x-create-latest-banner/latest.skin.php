<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>
<div class='latest_banner'>
<?php
	if ( $list ) {	
		$count = 1;
		$total_list_items = count($list) - 1;
		for( $i = 0; $i < $total_list_items; $i+=2 ) {			
?>					
		<?											
			$imgsrc_upper = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 242.5, 230);
			$imgsrc_lower = get_list_thumbnail($bo_table, $list[$i+1]['wr_id'], 242.5, 230);
			if ( empty($imgsrc_upper['src']) )  $imgsrc_upper['src'] = $latest_skin_url.'/img/no-image.png';
			
		?>
		<div class = 'image_group'>
			<div class='image_wrapper'>
				<a href=<?=$list[$i]['href']?>><img src='<?=$imgsrc_upper['src']?>'/></a>
				<div class='caption'>
					<a href='<?=$list[$i]['href']?>'><?=$list[$i]['subject']?></a>
					<a href='<?=$list[$i]['href']?>'><?=cut_str( strip_tags( $list[$i]['wr_content'] ),30,"..." )?></a>
				</div>
			</div>
			
			<div class='image_wrapper'>
				<a href=<?=$list[$i+1]['href']?>><img src='<?=$imgsrc_lower['src']?>'/></a>
				<div class='caption'>
					<a href='<?=$list[$i+1]['href']?>'><?=$list[$i]['subject']?></a>
					<a href='<?=$list[$i+1]['href']?>'><?=cut_str( strip_tags( $list[$i]['wr_content'] ),30,"..." )?></a>
				</div>
			</div>
		</div>
	<?		
		}
		$imgsrc_last = get_list_thumbnail($bo_table, $list[$total_list_items]['wr_id'], 242.5, 460);
	?>
		<div class = 'image_group'>
			<div class='image_wrapper'>
				<a href=<?=$list[$total_list_items]['href']?>><img src='<?=$imgsrc_last['src']?>'/></a>
				<div class='caption'>
					<a href='<?=$list[$total_list_items]['href']?>'><?=$list[$i]['subject']?></a>
					<a href='<?=$list[$total_list_items]['href']?>'><?=cut_str( strip_tags( $list[$i]['wr_content'] ),30,"..." )?></a>
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