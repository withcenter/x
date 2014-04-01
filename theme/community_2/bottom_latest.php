<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/bottom_latest.css' />
<script src='<?=x::url_theme()?>/js/bottom_latest.js'></script>
<?php
include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 

$bo_table = $option['bo_table'];
$latest_skin_url = x::url() . '/img';

$sql = " select * from {$g5['board_table']} where bo_table = '{$bo_table}' ";

$board = sql_fetch($sql);
$bo_subject = get_text($board['bo_subject']);

$tmp_write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
$sql = " select * from {$tmp_write_table} where wr_is_comment = 0 AND wr_file <> 0 order by wr_id DESC limit 0, 7 ";
$result = sql_query($sql);

for ($i=0; $row = sql_fetch_array($result); $i++) {
     $list[$i] = get_list($row, $board, $latest_skin_url, 60);
}

if ( $list ) {
echo "<div class='bottom_latest'>";
	foreach ( $list as $li ) {
		$thumb = get_list_thumbnail($bo_table, $li['wr_id'], 112, 112);
		$url = $li['href'];
		$subject = conv_subject($li['wr_subject'], 60, "..." );
		if ( $thumb['src'] ) {
			echo "
					<span class='photo'>
						<a href='$url'><img src='".$thumb['src']."' /></a>
						<a class='subject' href='$url'>
							<b>$subject</b>
						</a>
					</span>";
		}
	}
	echo "</div>";
}
?>