<?php
	$op = array(
					'domain'=>etc::domain(),
					'bo_table'=>bo_table($i+1),
					'limit'=>10,
					'order by'=>'wr_hit DESC, wr_datetime DESC',
	);
	$ranking_posts = g::posts($op);
?>
<div class='post-ranking'>
	<div class='title'>실시간 톡 인기글</div>
<?php
		for ( $k=0; $k< 10; $k++ ) {
			if ( $k < 2 ) $rank_new = "<img class='new_icon' src='".x::url_theme()."/img/new.png' />";
			else $rank_new = null;
			
			$rank_number = "<img class='rank-number' src='".x::url_theme()."/img/r".($k+1).".png' />";
			
			if ( $k  == 0 ) $add_row_class = 'rank-first-row';
			else $add_row_class = null;
			
			
			$url = G5_BBS_URL."/board.php?bo_table=".$ranking_posts[$i]['bo_table']."&wr_id=".$ranking_posts[$i]['wr_id'];
			
			echo "<div class='row $add_row_class'><a href='$url'>".$rank_number.conv_subject($ranking_posts[$k]['wr_subject'], 12, "...").$rank_new."</a></div>";
		} 
?>
</div>
