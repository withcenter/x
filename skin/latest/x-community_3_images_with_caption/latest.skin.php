<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='community_images_with_captions'>
		<div class='title'><img src='<?=$latest_skin_url?>/img/icon.png'/> <?=$bo_subject?></div>
<?php
	if ( $list ) {
		foreach( $list as $li ) {
<<<<<<< HEAD
		?>
=======
			?>		
			<?
				//if( $count % 4 == 0 ) $nomargin = 'no-margin';
				//else $nomargin = null;
			?>
>>>>>>> 8c68cad4cfc3635978b42db9021ac13a91b27484
				<div class='community_images_with_captions_container <?=$nomargin?>'>
					<div class='images_with_captions'>
						<div class='caption_image'>					
						<?						
							$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 172, 87);							
<<<<<<< HEAD
							if ( empty($imgsrc['src']) )  $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
							
=======
>>>>>>> 8c68cad4cfc3635978b42db9021ac13a91b27484
							
							if( !$imgsrc['src'] ) $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
														
							$img = "<img src='$imgsrc[src]'/>";						
							echo "<div class='img-wrapper'><a href='$li[href]'>".$img."</a></div>";
						?>
						</div>
						<div class='caption'><a href='<?=$li['href']?>'><?=conv_subject( $li['wr_subject'], 20, '...' )?></a></div>						
					</div>
				</div>		
	<?
		}
	}
	else echo "<b>".$bo_subject."</b>게시판에 글을 등록해 주세요";
?>

</div>