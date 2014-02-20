<?php
$rows = db::rows("SELECT wr_id, bo_table FROM $g5[board_new_table] WHERE wr_id = wr_parent AND bo_table LIKE 'withcenter%' ORDER BY bn_datetime DESC LIMIT 0, 10");

$q_tmp = array();
foreach ( $rows as $row ) {
	$q_tmp[$row['bo_table']][] = "wr_id = $row[wr_id]";
}

$posts = array();
foreach ( $q_tmp as $key => $value ) {
	$posts[$key] = db::rows("SELECT wr_id, wr_subject FROM ".$g5['write_prefix'].$key." WHERE ".implode ( ' OR ', $value ) );
}
?>
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/new.posts.css' />
<div class='new-posts'>
	 <div class='title'>
		<img class='new-post-icon' src='<?=x::url_theme()?>/img/icon4.gif' />
		새로 등록된 글
	 </div>
	 <?php
	  foreach ( $posts as $board_id => $post ) {
		foreach ( $post as $p ) {
			$url = G5_BBS_URL."/board.php?bo_table=$board_id&wr_id=$p[wr_id]";
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