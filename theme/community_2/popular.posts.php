<?php
$begin_date = date('Y-m-d H:i:s', time() - ( 60 * 60 * 24 * 30));
$forum_1 = ms::meta('forum_no_1');
$forum_2 = ms::meta('forum_no_2');
$forum_3 = ms::meta('forum_no_3');
$forum_4 = ms::meta('forum_no_4');
$forum_5 = ms::meta('forum_no_5');
$forum_6 = ms::meta('forum_no_6');

if ( g::forum_exist($forum_1) ) $row1[$forum_1] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix'].$forum_1." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
if ( g::forum_exist($forum_2) ) $row2[$forum_2] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix'].$forum_2." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
if ( g::forum_exist($forum_3) ) $row3[$forum_3] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix'].$forum_3." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
if ( g::forum_exist($forum_4) ) $row4[$forum_4] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix'].$forum_4." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");
if ( g::forum_exist($forum_5) ) $row5[$forum_5] = db::rows("SELECT wr_id, wr_subject, wr_datetime FROM ".$g5['write_prefix'].$forum_5." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 2");

if ( g::forum_exist($forum_1) && g::forum_exist($forum_2) && g::forum_exist($forum_3) && g::forum_exist($forum_4) && g::forum_exist($forum_5)) { 
	$posts = array_merge ( $row1, $row2, $row3, $row4, $row5 );
?>

<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/new.posts.css' />
<div class='popular-posts'>
	<div class='title'>
		<img class='new-post-icon' src='<?=x::url_theme()?>/img/icon5.gif' />
		조회수가 많은 글
	</div>
	<?php
	if ( $posts ) {
		foreach ( $posts as $key => $post ) {
			foreach ( $post as $p ) {
				$url = G5_BBS_URL."/board.php?bo_table=$key&wr_id=$p[wr_id]";
				$popular_subject = conv_subject( $p['wr_subject'], 14, '...');
				$dot_url = x::url_theme().'/img/dot.gif';
				echo "
						<div class='row'>
							<img class='dot-icon' src='$dot_url'/><a href='$url'>$popular_subject</a>
						</div>
				";
			}
		 }
	}
	else {?>
				<div class='row'>
					<img class='dot-icon' src='<?=$dot_url?>'/>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a>
				</div>
				<div class='row'>
					<img class='dot-icon' src='<?=$dot_url?>'/>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a>
				</div>
				<div class='row'>
					<img class='dot-icon' src='<?=$dot_url?>'/>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3'>커뮤니티 사이트 만들기</a>
				</div>
				<div class='row'>
					<img class='dot-icon' src='<?=$dot_url?>'/>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a>
				</div>
				<div class='row'>
					<img class='dot-icon' src='<?=$dot_url?>'/>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=1'>(모바일)홈페이지, 스마트폰 앱</a>
				</div>
	<?}?>
	</div>
<?}?>