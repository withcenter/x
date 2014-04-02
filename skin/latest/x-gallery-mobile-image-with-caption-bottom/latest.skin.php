<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>
<div class='gallery_mobile_images_with_captions_bottom'>
<?php
	if ( $list ) {	
		foreach( $list as $li ) {			
?>
				<div class='container'>
					<div class='images_with_captions'>
						<div class='caption_image'>	
							<div class='inner'>
								<?						
								$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 193, 218);							
								if ( empty($imgsrc['src']) )  $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
															
								$img = "<img src='$imgsrc[src]'/>";						
								echo "<div class='img-wrapper'><a href='$li[href]'>".$img."</a></div>";
								?>
							</div>
						</div>
						<div class='caption'>
							<div class='subject'><a href='<?=$li['href']?>'><?=$li['subject']?></a></div>
							<div class='content'><a href='<?=$li['href']?>'><?=cut_str(get_text(strip_tags($li['wr_content'])),220,"...")?></a></div>
						</div>
						<div style='clear:both'></div>
					</div>					
				</div>		
	<?
		}
	}
	else {
		for ( $i = 0; $i < 2; $i++ ) {?>
			<div class='container'>
					<div class='images_with_captions'>
						<div class='caption_image'>	
							<div class='inner'>
								<?						
															
								$imgsrc['src'] = $latest_skin_url.'/img/no-image.png';	
															
								$img = "<img src='$imgsrc[src]'/>";						
								echo "<div class='img-wrapper'><a href='".G5_BBS_URL."/write.php?bo_table=".$bo_table."'>".$img."</a></div>";
								?>
							</div>
						</div>
						<div class='caption'>
							<div class='subject'><a href='<?=G5_BBS_URL?>/write.php?bo_table=<?=$bo_table?>'>글을 등록해 주세요.</div>
							<div class='content'><a href='<?=G5_BBS_URL?>/write.php?bo_table=<?=$bo_table?>'>글을 등록해 주세요.</a></div>
						</div>
						<div style='clear:both'></div>
					</div>					
				</div>		
	<?
		}
	}	
?>
	<div style='clear:both'></div>
</div>