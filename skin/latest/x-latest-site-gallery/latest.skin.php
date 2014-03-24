<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet("<link rel='stylesheet' href='{$latest_skin_url}/style.css'>", 0);
include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 
echo "<div class='x-latest-site-gallery'>";
foreach ( $list as $li ) {
	$thumb = get_list_thumbnail($bo_table, $li['wr_id'], 60, 60);
	echo "
		<div class='photo'>
			<a href='".G5_BBS_URL."/board.php?bo_table=".$li['bo_table']."'><img src='".$thumb['src']."' /></a>
		</div>
	";
};
echo "
		<div style='clear:left;'></div>
	</div>";
?>
