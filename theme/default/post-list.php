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

if( !$posts ) {echo "empty"; return;}

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
			for( $i = ceil($total_posts/2)+1; $i <= $total_posts; $i++ ) {			
				$subject = conv_subject($posts[$i]['wr_subject'], 15, "...");	
				$wr_url =site_url($posts[$i]['domain']) . "/bbs/board.php?bo_table=" . $posts[$i]['bo_table'] . "&wr_id=".$posts[$i]['wr_id'];
				if( ($i+1) == $total_posts ) $last_post = 'last_post';				
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