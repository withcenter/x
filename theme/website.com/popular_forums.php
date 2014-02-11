<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/star.png'/>POPULAR POSTS</div>
		<div class='inner'>
		<?
		$q = "SELECT bo_table FROM ".$g5['board_table'];
		$queries = db::rows($q);
		$allhits = Array();
		$i = 0;
		foreach ( $queries as $query ){
			$q2 = "SELECT wr_id, wr_subject, wr_content, wr_hit FROM ".$g5['write_prefix'].$query['bo_table']." ORDER BY wr_hit DESC, wr_datetime DESC";
			$queries2 = db::rows($q2);
	
			foreach( $queries2 as $qs2 ){
				$qs2['bo_table'] = $query['bo_table'];
				$allhits[$i] = $qs2;				
				$i++;
			}					
		}

		usort($allhits, function($a, $b) {
			return $b['wr_hit'] - $a['wr_hit'];
		});

		for( $count = 0; $count < 3; $count++ ) {
		$post_url = g::url()."/bbs/board.php?bo_table=".$allhits[$count]['bo_table']."&wr_id=".$allhits[$count]['wr_id'];
		?>
			<div class='info-wrapper'>
				<div class='top-info bo-table'><a href='<?=$post_url?>'><?=$allhits[$count]['bo_table']?></a></div>
				<div class='other-info subject'><a href='<?=$post_url?>'><?=substr($allhits[$count]['wr_subject'],0,10)?> (Views: <?=$allhits[$count]['wr_hit']?> )</a></div>
				<div class='other-info content'><a href='<?=$post_url?>'><?=$allhits[$count]['wr_content']?></a></div>
			</div>
		<?}?>		
	</div>
	<div class='view-more'><a href="#">VIEW MORE</a></div>
</div>