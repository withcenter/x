<?php

$image_url = x::url_theme().'/img';
$title_icon1 = "<img src='$image_url/wrench-blue.png' />";
echo "<div class='latest-posts'>
		<div class='title'>$title_icon1 <a href='javascript:void(0)'>최신 등록글</a></div>
	";
$posts = g::posts(
	array (
		'limit'					=> 30,
		'order by' 				=> 'wr_datetime DESC'
		
	)
);
	
foreach ( $posts as $p ) {

	$subject = conv_subject($p['wr_subject'], 15, "...");
	
		
		$wr_url ="http://".$p['domain']."/bbs/board.php?bo_table=".$p['bo_table']."&wr_id=".$p['wr_id'];
		echo "
			<div class='row'>
				<img class='dot' src='$dot'/>
				<a href='$wr_url' target='_blank'>$subject</a>
			</div>
		";
	}

echo "</div>";

