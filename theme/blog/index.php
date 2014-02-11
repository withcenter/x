<? 
$option = db::rows("SELECT * FROM $g5[write_prefix]".$extra['menu_1']." ORDER BY wr_num");
for ( $i = 0; $i <= 2; $i++) { 	
	if( !$option[$i]['wr_subject'] == '' ) {
		if( !$option[$i]['wr_file'] == 0 ) { /**checks if there is a file on the post */
			$option[$i]['file'] = db::rows("SELECT * FROM $g5[board_file_table] WHERE bo_table='$extra[menu_1]' AND wr_id='".$option[$i]['wr_id']."'");
			$option[$i]['file']['path'] = G5_URL.'/'.G5_DATA_DIR.'/file/'.$extra['menu_1'].'/';
			$option[$i]['file']['count'] = db::result("SELECT MAX(bf_no) FROM $g5[board_file_table] WHERE bo_table='$extra[menu_1]' AND wr_id='".$option[$i]['wr_id']."'");
		}
	?>
		<div class='post-container'>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_1']?>&wr_id=<?=$option[$i]['wr_id']?>'>
			<table width='100%'>
				<tr>
					<td><div  class='subject-container' ><span class='subject'><?=$option[$i]['wr_subject']?></span></div></td>
					<td align='right'>
						<div  class='date-author-container'>
							<span class='date-author'>
								<?=$newDate = date("M d Y", strtotime($option[$i]['wr_datetime']))?>
								by <?=$option[$i]['wr_name']?>
							</span>
						</div>
					</td>
				</tr>
				<tr><td colspan=2><span class='post-content'>
				<? for ( $img = 0; $img <= $option[$i]['file']['count']; $img++ ) { ?>
					<img src="<?=$option[$i]['file']['path'].$option[$i]['file'][$img]['bf_file']?>">
				<?}
					echo $option[$i]['wr_content']?></span></td></tr>
			</table>
			</a>
		</div>
<?}}?>