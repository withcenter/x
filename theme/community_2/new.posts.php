<?php
/** @node old code. ready to be deleted */
/*
$rows = db::rows("SELECT wr_id, bo_table FROM $g5[board_new_table] WHERE wr_id = wr_parent AND bo_table LIKE '".ms::board_id( etc::domain() )."%' ORDER BY bn_datetime DESC LIMIT 0, 15");
$q_tmp = array();
foreach ( $rows as $row ) {
	$q_tmp[$row['bo_table']][] = "wr_id = $row[wr_id]";
}
$posts = array();
foreach ( $q_tmp as $key => $value ) {
	$posts[$key] = db::rows("SELECT wr_id, wr_subject FROM ".$g5['write_prefix'].$key." WHERE ".implode ( ' OR ', $value ) );
}
*/

$posts = g::posts( array( 'domain'=>etc::domain(), 'limit'=>15) );

?>
	<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/new.posts.css' />
	<div class='new-posts'>
		 <div class='title'>
			<img class='new-post-icon' src='<?=x::url_theme()?>/img/icon4.gif' />
			새로 등록된 글
		 </div>
		 <?php
		 $dot_url = x::url_theme().'/img/dot.gif';
		 
		 if ( $posts ) {
			foreach ( $posts as $p ) {
				$url = G5_BBS_URL."/board.php?bo_table=$p[bo_table]&wr_id=$p[wr_id]";
				$new_subject = conv_subject( $p['wr_subject'], 14, '...');					
				echo "
						<div class='row'>
							<img class='dot-icon' src='$dot_url'/><a href='$url'>$new_subject</a>
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