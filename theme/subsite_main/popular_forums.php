<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/star.png'/>죄회수가 많은 글</div>
		<div class='inner'>
		<?
		$q = "SELECT * FROM `x_post_data`";
		$popular_forums = db::rows($q);
		foreach ( $popular_forums as $key => $value ) {
			$popular_forums[$key]['bo_subject']	= db::result("SELECT bo_subject FROM ".$g5['board_table']." WHERE bo_table='".$value['bo_table']."'");
		}
		function comp_hit($a, $b) {
			return $b['wr_hit'] - $a['wr_hit'];
		}
		usort($popular_forums, 'comp_hit');

		for( $count = 0; $count < 3; $count++ ) {
		$post_url = g::url()."/bbs/board.php?bo_table=".$popular_forums[$count]['bo_table']."&wr_id=".$popular_forums[$count]['wr_id'];
	
		$popular_subject = cut_str($popular_forums[$count]['wr_subject'], 15, "...");
		$popular_content = cut_str($popular_forums[$count]['wr_content'], 20, "...");
		?>
			<div class='info-wrapper'>
				<div class='top-info bo-table'><a href='<?=$post_url?>' target='_blank'><?=$count+1?>) <?=$popular_forums[$count]['bo_subject']?> (조회수: <?=$popular_forums[$count]['wr_hit']?> )</a></div>
				<div class='other-info subject'><a href='<?=$post_url?>' target='_blank'><?=strip_tags($popular_subject)?></a></div>
				<div class='other-info content'><a href='<?=$post_url?>' target='_blank'><?=strip_tags($popular_content)?></a></div>
			</div>
		<?}?>

	<div class='view-more'><a href="<?=x::url()?>/?module=multi&action=forum.list">자세히</a></div>
</div>