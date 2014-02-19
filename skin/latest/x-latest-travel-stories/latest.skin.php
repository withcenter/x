<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='stories-container'>
<?php
	foreach( $list as $li ) {
		if( !$li['wr_subject'] == '' ) {
		if( !$li['file']['count'] == 0 ) { /**checks if there is a file on the post */
			$i = 0;
			$li['file']['meta'] = db::rows("SELECT * FROM $g5[board_file_table] WHERE bo_table='$bo_table' AND wr_id='".$li['wr_id']."'");
			$li['file']['path'] = G5_URL.'/'.G5_DATA_DIR.'/file/'.$bo_table.'/';	
		}}
		?>
		<a href='<?=$li['href']?>'>
			<div class='travel-story'>
				<table>
					<tr valign='top'>
						<td width='50px'>
						<div class='img-container'>
							<?
								if ( $li['file']['meta'][$i]['bf_file'] != '' ) $imgsrc = $li['file']['path'].$li['file']['meta'][$i]['bf_file']; 
								else $imgsrc = $latest_skin_url.'/img/no-image.png';
							
								$img = "<img src='".$imgsrc."'/>";
								
								$img = get_view_thumbnail($img, 120);
								echo "<div class='img-wrapper'>".$img."<div>";
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

