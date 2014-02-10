<? 
$option = db::rows("SELECT * FROM $g5[write_prefix]".$extra['menu_1']." ORDER BY wr_num");
for ( $i = 0; $i <= 2; $i++) { 
	if( !$option[$i]['wr_subject'] == '' ) {
	?>
		<div class='post-container'>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_1']?>'>
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
				<tr><td colspan=2><span class='post-content'><?=$option[$i]['wr_content']?></span></td></tr>
			</table>
			</a>
		</div>
<?}}?>