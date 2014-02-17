<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/star.png'/>죄회수가 많은 글</div>
		<div class='inner'>
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

		for( $count = 0; $count < 3; $count++ ) {
		$post_url = g::url()."/bbs/board.php?bo_table=".$allhits[$count]['bo_table']."&wr_id=".$allhits[$count]['wr_id'];
		
		$popular_subject = cut_str($allhits[$count]['wr_subject'], 20, "...");
		$popular_content = cut_str($allhits[$count]['wr_content'], 20, "...");
		?>
			<div class='info-wrapper'>
				<div class='top-info bo-table'><a href='<?=$post_url?>' target='_blank'><?=$count+1?>) <?=$allhits[$count]['bo_subject']?> (조회수: <?=$allhits[$count]['wr_hit']?> )</a></div>
				<div class='other-info subject'><a href='<?=$post_url?>' target='_blank'><?=$popular_subject?></a></div>
				<div class='other-info content'><a href='<?=$post_url?>' target='_blank'><?=$popular_content?></a></div>
			</div>
		<?}?>
	<? }?>	
	</div>
	<div class='view-more'><a href="<?=x::url()?>/?module=multisite&action=forum.list">자세히</a></div>
</div>