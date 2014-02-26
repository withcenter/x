<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='bottom-panel'>
	<div class='travel-packages'>
		<div class='title'><?=$bo_subject?></div>
<?php
	if ( $list ) {
		$count = 1;
		foreach( $list as $li ) {
		
			if( !$li['wr_subject'] == '' ) {
			if( !$li['file']['count'] == 0 ) { /**checks if there is a file on the post */
					$li['file']['meta'] = db::rows("SELECT * FROM $g5[board_file_table] WHERE bo_table='$bo_table' AND wr_id='".$li['wr_id']."'");
					$li['file']['path'] = G5_URL.'/'.G5_DATA_DIR.'/file/'.$bo_table.'/';
					
					for( $ctr = 0; $ctr <= $li['file']['count']; $ctr++ ){
						if( $li['file']['meta'][$ctr]['bf_file'] ){
							$has_image = $li['file']['meta'][$ctr]['bf_file'];
							break;
						}
					}
				}
				else $has_image = null;
			}
			?>		
			<?
				if( $count == 5 ) $nomargin = 'no-margin';
			?>
				<div class='travel-package-container <?=$nomargin?>'>
					<div class='travel-package'>
						<div class='travel-image'>					
						<?
							if ( $has_image) {							
								$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 187, 104);							
							}
							else $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
							
							
							$img = "<img src='$imgsrc[src]'/>";						
							echo "<div class='img-wrapper'><a href='$li[href]'>".$img."</a></div>";
						?>
						</div>
						<div class='travel-title'><a href='<?=$li['href']?>'><?=conv_subject( $li['wr_subject'], 40, '...' )?></a></div>
						<div class='travel-content'><a href='<?=$li['href']?>'><?=cut_str(strip_tags( $li['wr_content']), 50, '...' )?></a></div>
						<div class='travel-price'><a href='<?=$li['href']?>'>
						<? if ( $li['wr_1'] ) echo $li['wr_1'];	?>
						</a>
						</div>
					</div>
				</div>		
	<?
		$count++;
		}
	}
	else echo "<b>".$bo_subject."</b>게시판에 글을 등록해 주세요";
?>

	</div>
</div>