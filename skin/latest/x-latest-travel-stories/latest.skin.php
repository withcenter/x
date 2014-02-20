<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='stories-container'>
<?php
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
			<div class='travel-story'>
				<table>
					<tr valign='top'>
						<td width='50px'>
						<div class='img-container'>
							<?
								if ( $has_image ){
									$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 84, 84);
								}
								else $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';
							
								$img = "<img src='".$imgsrc['src']."'/>";
								
								$img_thumbnail = get_view_thumbnail($img, 120);
								echo "<div class='img-wrapper'>".$img_thumbnail."<div>";
							?>	
						</div>
						</td>
						<td>
						<?php
							echo "<span class='travel-title'>".conv_subject($li['wr_subject'],20,'...')."</span><br>";
							echo "<span class='travel-meta'>posted by ".$li['mb_id']."<br>";
							echo "on ".date('M d, Y',strtotime($li['wr_datetime']))."</span>";
						?>
						</td>
					</tr>
					<tr valign='top'>
						<td colspan=2 width='100px'>
						<?php
							echo "<span class='travel-content'>".cut_str( strip_tags( $li['wr_content'] ) ,100,'...')."</span>";
						?>
						</td>
					</tr>
		

				</table>
									<div class='more-button'><img src="<?=$latest_skin_url.'/img/more-btn.png'?>"></div>
			</div>
		</a>
		<?
	}
?>
</div>

