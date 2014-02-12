<?php
$query = "SELECT wr_id, bo_table FROM g5_board_new ORDER BY bn_datetime DESC  LIMIT 0, 30";
$rows = db::rows( $query );

$tmp_q = array();
/* 게시판 별로 최신글 번호를 배열로 저장한다. */

foreach ( $rows as $row ) {
	if ( preg_match('/^ms_/i', $row['bo_table']) ) {
		$tmp_q[$row['bo_table']][] = "wr_id = ".$row['wr_id'];
	}
}

$lp = array();
//$list['href'] = G5_BBS_URL.'/board.php?bo_table='.$board['bo_table'].'&amp;wr_id='.$list['wr_id']
$image_url = x::url_theme().'/img';
$title_icon1 = "<img src='$image_url/directions-blue.png' />";
echo "<div class='latest-posts'>
		<div class='title'>$title_icon1 <a href='#'>최신 등록글</a></div>
	";
foreach ( $tmp_q as $key => $value ) {
	$cond = "(". implode( ' OR ', $value ) . ")";
	if ( $cond ) $cond = " WHERE ".$cond;
	else $cond = null;
	
	$query = "SELECT wr_id, wr_subject FROM ".$g5['write_prefix'].$key." ".$cond." ORDER BY wr_datetime DESC";
	$posts = db::rows ( $query );
	
	foreach ( $posts as $p ) {

		$subject = conv_subject($p['wr_subject'], 15, "...");
		$d_tmp = explode('_', $key);
		$sub_domain = $d_tmp[1];
		
		$wr_url ="http://".$sub_domain.".".etc::base_domain().'/bbs/board.php?bo_table='.$key.'&amp;wr_id='.$p['wr_id'];
		echo "
			<div class='row'>
				<img class='dot' src='$dot'/>
				<a href='$wr_url' target='_blank'>$subject</a>
			</div>
		";
	}
}

echo "</div>";

