<div class='page-header'>
	최근 등록된 글
</div>

<?
$posts = g::posts(
	array (
		'limit'					=> 30,
		'order by' 				=> 'wr_datetime DESC'
		
	)
);
	
foreach ( $posts as $p ) {

	$subject = conv_subject($p['wr_subject'], 15, "...");
	
		
		$wr_url =site_url($p['domain']) . "/bbs/board.php?bo_table=" . $p['bo_table'] . "&wr_id=".$p['wr_id'];
		echo "
			<div class='row'>
				<a href='$wr_url' target='_blank'>$subject</a>
			</div>
		";
	}

echo "</div>";


