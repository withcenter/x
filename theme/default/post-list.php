<div class='page-header'>
	<div>
		최근 등록된 글
	</div>
</div>

<div class='content'>

<?
$posts = g::posts(
	array (
		'limit'					=> 30,
		'order by' 				=> 'wr_datetime DESC'
		
	)
);
$total_posts = count($posts);
?>
	<div class='listed_posts left'>
		<div class='inner'>
			<?
			for( $i = 0; $i < ceil($total_posts/2); $i++ ) {
				$subject = conv_subject($posts[$i]['wr_subject'], 15, "...");	
				$wr_url =site_url($posts[$i]['domain']) . "/bbs/board.php?bo_table=" . $posts[$i]['bo_table'] . "&wr_id=".$posts[$i]['wr_id'];
				if( ($i + 1) >= $total_posts/2 ) $last_post = 'last_post';	
			?>	
						<div class='list_item <?=$last_post?>'>
							<a href='<?=$wr_url?>' target='_blank'><?=$subject?></a>
						</div>
			<?			
				}
				$last_post = null;
			?>
		</div>
	</div>	
	<div class='listed_posts right'>
		<div class='inner'>
			<?		
			for( $i2 = ceil($total_posts/2); $i2 <= $total_posts; $i2++ ) {
				$subject = conv_subject($posts[$i2]['wr_subject'], 15, "...");	
				$wr_url =site_url($posts[$i2]['domain']) . "/bbs/board.php?bo_table=" . $posts[$i2]['bo_table'] . "&wr_id=".$posts[$i2]['wr_id'];
				if( ($i2+1) == $total_posts ) $last_post = 'last_post';			
				//di( $post_count." ".$total_posts );
			?>	
						<div class='list_item <?=$last_post?>'>
							<a href='<?=$wr_url?>' target='_blank'><?=$subject?></a>
						</div>
			<?			
				}
				$last_post = null;
			?>
		</div>
	</div>
	<div style='clear:both'></div>
</div>