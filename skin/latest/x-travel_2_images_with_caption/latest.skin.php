<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='travel_images_with_captions'>
		<div class='title'><img src='<?=$latest_skin_url?>/img/2paperswhite.png'/> <?=$bo_subject?></div>
<?php	
	if ( $list ) {
	$count = 1;
		foreach( $list as $li ) {
?>
				<div class='travel_images_with_captions_container'>
					<div class='images_with_captions'>
						<div class='caption_image'>					
						<?						
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 161, 108);							
							if ( empty($imgsrc['src']) )  $imgsrc['src'] = null;
														
							$img = "<img src='$imgsrc[src]'/>";						
							echo "<div class='img-wrapper'><a href='$li[href]'>".$img."</a></div>";
							
							if( $li['wr_1'] ) $product_name = conv_subject( $li['wr_1'], 20, '...' );
							else $product_name = "No product name";
							
							if( $li['wr_2'] ) $product_price = $li['wr_2'];
							else $product_price = "No product price";													
						?>
						</div>
						<div class='caption product_name'><a href='<?=$li['href']?>'><?=$product_name?></a></div>
						<div class='caption product_price'><a href='<?=$li['href']?>'><?=$product_price?></a></div>
						<div class='caption product_subject'><a href='<?=$li['href']?>'><?=conv_subject( $li['wr_subject'], 70, '...' )?></a></div>
					</div>
				</div>		
	<?
		$count++;
		}
	}
	else echo "<b>".$bo_subject."</b>게시판에 글을 등록해 주세요";
		
?>
<div style='clear:both;'></div>
</div>