<?php
/** old code. Delete this comment and code whenever wanted. */
/*
$begin_date = date('Y-m-d H:i:s', time() - ( 60 * 60 * 24 * 30));
for ( $i = 1 ; $i <= 10; $i++ ) {
	${'forum_'.$i} = ms::meta('forum_no_'.$i);
}

for ( $i = 1 ; $i <= 10 ; $i++ ) {
	if ( !(${'forum_' . $i}) ) continue;
		$posts[${'forum_' . $i}] = db::rows("SELECT * FROM ".$g5['write_prefix'].${'forum_' . $i}." WHERE wr_datetime > '$begin_date' ORDER BY wr_hit DESC LIMIT 3");
}
$posts = array_filter( $posts );
*/

$posts = g::posts(
	array(
		'domain'=>etc::domain(),
		'wr_datetime'=> '>' . g::datetime( time() - ONEDAY ),
		'order by'=>'wr_hit DESC',
		'limit'=>10
	)
);
?>

<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/new.posts.css' />
<div class='popular-posts'>
	<div class='title'>
		<img class='new-post-icon' src='<?=x::url_theme()?>/img/icon5.gif' />
		조회수가 많은 글
	</div>
	<?php

	$dot_url = x::url_theme().'/img/dot.gif';		
	if ( $posts ) {
			foreach ( $posts as $p ) {				
				$url = g::url()."/bbs/board.php?bo_table=$p[bo_table]&wr_id=$p[wr_id]";
				$popular_subject = conv_subject( $p['wr_subject'], 14, '...');				
				echo "
						<div class='row'>
							<img class='dot-icon' src='$dot_url'/><a href='$url'>$popular_subject</a>
						</div>
				";
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
