<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<?if( $list ) {?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='bottom-panel'>
	<div class='travel-packages'>
		<h2> Best Travel Packages </h2>
<?php
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
		<a href='<?=$li['href']?>'>
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
						echo "<div class='img-wrapper'>".$img."</div>";
					?>
					</div>
					<div class='travel-title'><?=conv_subject( $li['wr_subject'], 40, '...' )?></div>
					<div class='travel-content'><?=cut_str(strip_tags( $li['wr_content']), 50, '...' )?></div>
					<div class='travel-price'>
					<?
						if ( !empty($li['wr_1']) ) echo $li['wr_1'];
						else echo "<b>clone x-board-travel<br>to input price</b>";					
					?>
					</div>
				</div>
			</div>	
		</a>	
<?
	$count++;
	}
?>

	</div>
</div>
<?}?>