<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='community_images_with_captions_2'>		
<?php
	if ( $list ) {
		$count = 1;
		foreach( $list as $li ) {			
			?>		
			<?
				//if( $count % 4 == 0 ) $nomargin = 'no-margin';
				//else $nomargin = null;
			?>
				<div class='community_images_with_captions_container_2 <?=$nomargin?>'>
					<div class='images_with_captions_2'>
						<div class='caption_image_2'>					
						<?
						if( $count == 1 ){
							$count++;
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 288, 258);													
							if( !$imgsrc['src'] ) $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';

							$img = "<img src='$imgsrc[src]'/>";						
							echo "<div class='img-wrapper_2_first'><a href='$li[href]'>".$img."</a></div>";
							continue;				
						}
							
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 138, 98);							
							
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