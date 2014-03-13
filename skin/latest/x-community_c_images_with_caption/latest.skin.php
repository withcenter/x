<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='community_images_with_captions'>
		<div class='title'>
			<img src='<?=$latest_skin_url?>/img/icon.png'/> <?=$bo_subject?>
			<a class='more-button' href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'>자세히</a>
			<div style='clear:right;'></div>
		</div>
<?php
	if ( $list ) {
		foreach( $list as $li ) {
?>
				<div class='community_images_with_captions_container <?=$nomargin?>'>
					<div class='images_with_captions'>
						<div class='caption_image'>					
						<?						
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 172, 87);
							$imgclass = '';						
							if ( empty($imgsrc['src']) ) {
								$imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
								$imgclass = 'no-image';
							}			
							$img = "<img src='$imgsrc[src]' />";						
							echo "<div class='img-wrapper $imgclass'><a href='$li[href]'>".$img."</a></div>";
						?>
						</div>
						<div class='caption'><a href='<?=$li['href']?>'><?=conv_subject( $li['wr_subject'], 20, '...' )?></a></div>						
					</div>
				</div>		
	<?
		}
	}
	else {
		for ( $i = 0; $i < 4; $i++ ) {?>
			<div class='community_images_with_captions_container <?=$nomargin?>'>
				<div class='images_with_captions'>
						<div class='caption_image'>					
						<? $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
														
							$img = "<img src='$imgsrc[src]'/>";						
							echo "<div class='img-wrapper'><a href='".url_site_config()."'>".$img."</a></div>";
						?>
						</div>
					<div class='caption'><a href='<?=url_site_config()?>'>글을 등록해 주세요</a></div>						
				</div>
			</div>		
	<?
		}
	}	
?>

</div>