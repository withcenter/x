
		<?
		$q = "SELECT bo_table, bo_subject FROM ".$g5['board_table'];
		$queries = db::rows($q);
	if ( $queries ) {
		$allhits = Array();
		$i = 0;

		foreach ( $queries as $query ){
			$q2 = "SELECT wr_id, wr_subject, wr_content, wr_hit FROM ".$g5['write_prefix'].$query['bo_table'];
			$queries2 = db::rows($q2);
	
			foreach( $queries2 as $qs2 ){
				$qs2['bo_table'] = $query['bo_table'];
				$qs2['bo_subject'] = $query['bo_subject'];
				$allhits[$i] = $qs2;
				$i++;
			}					
		}

		usort($allhits, function($a, $b) {
			return $b['wr_hit'] - $a['wr_hit'];
		});
		echo "<table cellpadding='10px' style='text-align: left'>";
		for( $count = 0; $count < 3; $count++ ) {
		$post_url = g::url()."/bbs/board.php?bo_table=".$allhits[$count]['bo_table']."&wr_id=".$allhits[$count]['wr_id'];
		
		$popular_subject = cut_str($allhits[$count]['wr_subject'], 20, "...");
		$popular_content = cut_str($allhits[$count]['wr_content'], 20, "...");
		?>
			<tr>
				<td>
					<a href='<?=$post_url?>' target='_blank'>
						<?=strip_tags($popular_subject)?> (조회수 <?=$allhits[$count]['wr_hit']?>)<br>
						<?=strip_tags($popular_content)?>
					</a>
				</td>
			</tr>
		<?}?>
		</table>
		<p><a href="<?=x::url()?>/?module=multisite&action=forum.list">자세히</a></p>
	<? }?>	

