<?php
$begin_date = date('Y-m-d H:i:s', time() - ( 60 * 60 * 24 * 30));
if ( g::forum_exist( 'withcenter1' ) ) {
	$row1['withcenter1'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."withcenter1 WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row2['withcenter2'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."withcenter2 WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row3['withcenter3'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."withcenter3 WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row4['withcenter4'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."withcenter4 WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row5['withcenter5'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."withcenter5 WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
}
else {
	$row1['withcenter1'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."default WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row2['withcenter1'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."default WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row3['withcenter1'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."default WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row4['withcenter1'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."default WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
	$row5['withcenter1'] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix']."default WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
}
$posts = array_merge ( $row1, $row2, $row3, $row4, $row5 );
?>

<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/new.posts.css' />
<div class='popular-posts'>
	<div class='title'>
		<img class='new-post-icon' src='<?=x::url_theme()?>/img/icon5.gif' />
		조회수가 많은 글
	</div>
	<?php
	foreach ( $posts as $key => $post ) {
		foreach ( $post as $p ) {
			$url = G5_BBS_URL."/board.php?bo_table=$key&wr_id=$p[wr_id]";
			$subject = conv_subject( $p['wr_subject'], 14, '...');
			$dot_url = x::url_theme().'/img/dot.gif';
			echo "
					<div class='row'>
						<img class='dot-icon' src='$dot_url'/><a href='$url'>$subject</a>
					</div>
			";
		}
	 }
	?>
</div>