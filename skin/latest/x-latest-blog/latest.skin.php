<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<?

if ( $list ) {
	foreach ( $list as $li ) {

		if( !$li['wr_subject'] == '' ) {
			if( !$li['file']['count'] == 0 ) { /**checks if there is a file on the post */
				$i = 0;
				while( $i <= $li['file']['count'] ) { /** get file(s) info **/
					$li['file']['meta'] = db::rows("SELECT * FROM $g5[board_file_table] WHERE bo_table='$bo_table' AND wr_id='".$li['wr_id']."'");
					$li['file']['path'] = G5_URL.'/'.G5_DATA_DIR.'/file/'.$bo_table.'/';
					$i++;
				}
				
		}}
?>
		<div class='post-container'>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'>
			<table width='100%'>
				<tr>
					<td><div  class='subject-container' ><span class='subject'><?=$li['wr_subject']?></span></div></td>
					<td align='right'>
						<div  class='date-author-container'>
							<span class='date-author'>
								<b>글쓴이</b> <span><?=$li['wr_name']?></span>
								<b>작성일</b><?=$newDate = date("Y-m-d", strtotime($li['wr_datetime']))?>
							</span>
						</div>
					</td>
				</tr>
				<tr><td colspan=2><span class='post-content'>
				<span class='post-images'>
				<? for ( $img = 0; $img < 1; $img++ ) { 
					if ($li['file']['meta'][$img]['bf_file'] != '') {?>
						<img src="<?=$li['file']['path'].$li['file']['meta'][$img]['bf_file']?>">
				<?}}?>
				</span>
					<?=cut_str(strip_tags($li['wr_content']),1000,'...')?></span></td></tr>
			</table>
			</a>
		</div>
<? }
}
?>

