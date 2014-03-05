<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='travel_images_with_captions'>
		<div class='title'>
		<span class='travel-subject'>
		<img src='<?=$latest_skin_url?>/img/2paperswhite.png'/>
		<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'><?=$bo_subject?></a>
		</span>
		
		<a class='more_button' href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">자세히</a>
		<div style='clear: both'></div>
		</div>

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
							if( $imgsrc['src'] ) $img = "<img src='$imgsrc[src]'/>";
							else $img = "<img src='{$latest_skin_url}/img/no_image.png' />";
						
							echo "<div class='img-wrapper'><a href='$li[href]'>".$img."</a></div>";
							
							if( $li['wr_1'] ) $product_name = conv_subject( $li['wr_1'], 20, '...' );
							else $product_name = "상품명을 입력해 주세요";
							
							if( $li['wr_2'] ) $product_price = $li['wr_2'];
							else $product_price = "상품가를 입력해 주세요";											
						?>
						</div>
						<div class='caption product_name'><a href='<?=$li['href']?>'><?=$product_name?></a></div>
						<div class='caption product_price'><a href='<?=$li['href']?>'><?=$product_price?></a></div>
						<div class='product_subject'><a href='<?=$li['href']?>'><?=conv_subject( $li['wr_subject'], 70, '...' )?></a></div>
					</div>
				</div>		
	<?
		$count++;
		}
	}
	else {
			for ( $i = 0; $i < 6; $i++ ) {?>
				<div class='travel_images_with_captions_container'>
					<div class='images_with_captions'>
						<div class='caption_image'>					
							<div class='img-wrapper'><a href='javascript:void(0)'><img src='<?=$latest_skin_url?>/img/no_image.png' /></a></div>
						</div>
						<div class='caption product_name'><a href='javascript:void(0)'>상품명 입력</a></div>
						<div class='caption product_price'><a href='javascript:void(0)'>2,000페소</a></div>
						<div class='product_subject'><a href='javascript:void(0)'><center>글을 등록해 주세요</center></a></div>
					</div>
				</div>
			<?}?>
	<?}
		
?>
<div style='clear:both;'></div>
</div>