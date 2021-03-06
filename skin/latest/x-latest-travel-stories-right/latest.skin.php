<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='travel-stories-right'>	
<div class='stories-container'>
<?php
	if ( $list ) {
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
			<div class='travel-story'>
					
					<table>
						<tr valign='top'>
							<td width='88px'>
							<div class='img-container'>
								<?
									if ( $has_image ){
										$imgsrc = get_list_thumbnail($bo_table, $li['wr_id'], 84, 84);
									}
									else $imgsrc['src'] = $latest_skin_url.'/img/no-image.png';							
									$img = "<img src='".$imgsrc['src']."'/>";																
									echo "<div class='img-wrapper'><a href='<?=$li[href]?>'>".$img."</a></div>";
								?>	
							</div>
							</td>
							<td width='112px'>
							<?php
								echo "<div class='travel-title'><a href='$li[href]'>".conv_subject($li['wr_subject'],20,'...')."</a></div>";
								echo "<div class='travel-meta'><b>작성자</b> ".$li['mb_id']."<br>";
								echo "<b>등록일</b> ".date('Y.m.d',strtotime($li['wr_datetime']))."</div>";
							?>
							</td>
						</tr>
						<tr valign='top'>
							<td colspan=2 width='200px'>
							<?php
								echo "<span class='travel-content'><a href='<?=$li[href]?>'>".cut_str( strip_tags( $li['wr_content'] ) ,100,'...')."</a></span>";
							?>
							</td>
						</tr>
			

					</table>
					<div class='more-button'><a href='<?=$li['href']?>'><img src="<?=$latest_skin_url.'/img/more-btn.png'?>"></a></div>			
				</a>
			</div>
			<?
		}
	} 
	else echo "<b>".$bo_subject."</b>게시판에 글을 등록해 주세요";
?>
</div>
</div>

