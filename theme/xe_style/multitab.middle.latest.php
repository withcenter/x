<?php
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$mmposts = array();
for ( $i=6; $i < 9; $i++ ) {
	$option = array(
						'domain'=>etc::domain(),
						'bo_table'=>bo_table($i),
						'limit'=>5,
						'order by'=>'wr_datetime DESC'
	);
	$mmposts[] = g::posts($option);
}
for ( $l=0; $l< 3; $l++ ) {
echo "<div class='tab-bottom'>";
	foreach ( $mmposts[$l] as $p ) {
		$imgsrc = get_list_thumbnail($p['bo_table'], $p['wr_id'], 105, 69);
		if ( $imgsrc['src'] ) {
			$img = "<img src='$imgsrc[src]'/>";
		} else if ( $image_from_tag = g::thumbnail_from_image_tag( $p['wr_content'], $p['bo_table'], 105, 69 )) {
		$img = "<img class='img_left' src='$image_from_tag'/>";
		} else $img = "<img src='".x::url_theme()."/img/no_image.png'";
		
		echo "1
				<div class='photo'>
					$img
				</div>
		";
	}
	echo "<div style='clear:left;'></div>";
	echo "</div>";
}