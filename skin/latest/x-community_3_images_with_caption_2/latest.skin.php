<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='community_images_with_captions_2'>		
<?php
	if ( $list ) {	
		$count = 1;
		
			$imgsrc = get_list_thumbnail($bo_table, $list[0]['wr_id'], 288, 258);													
			if( !$imgsrc['src'] ) $imgsrc['src'] = $latest_skin_url.'/img/no-image-big.png';

			$img = "<img src='".$imgsrc['src']."'/>";						
			echo "<div class='first_image'>
					<a href='".$list[0]['href']."'>".$img."</a>
					<div class='first_image_caption'><a href='".$list[0]['href']."'>".conv_subject($list[0]['wr_subject'],20,"...")."</a></div>
				</div>";
			
		?>
		<div class='other_images'>
		<?
		foreach( $list as $li ) {
			if( $count == 1 ){$count++; continue;}
			?>		
			<?
				if( $count % 3 == 1 ) $nomargin = 'no-margin';
				else $nomargin = null;
			?>
				<div class='community_images_with_captions_container_2 <?=$nomargin?>'>
					<div class='images_with_captions_2'>
						<div class='caption_image_2'>					
						<?		
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 135, 98);							
							
							if( !$imgsrc['src'] ) $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
							
							
							$img = "<img src='$imgsrc[src]'/>";						
							echo "<div class='img-wrapper_2'><a href='$li[href]'>".$img."</a></div>";
						?>
						</div>
						<div class='caption_2'><a href='<?=$li['href']?>'><?=conv_subject( $li['wr_subject'], 20, '...' )?></a></div>						
					</div>
				</div>		
	<?
		$count++;
		}
	}
	else echo "<b>".$bo_subject."</b>게시판에 글을 등록해 주세요";
?>	
	</div>	
	<div style='clear:both'></div>
</div>
