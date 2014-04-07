<?php
add_stylesheet("<link rel='stylesheet' type='text/css' href='".x::url_theme()."/css/multitab.middle.latest.css' />", 0);
?>
<script src='<?=x::url_theme()?>/js/multitab.middle.latest.js'></script>
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
echo "<div class='multitab-middle-latest'>
		<span class='title'>GNUXE HUMOR</span>
		<ul class='menu-tab'>
			<li menu=2 class='last-menu'>메뉴2</li>
			<li menu=1>메뉴1</li>
			<li menu=0>메뉴0</li>
		</ul>
		<div style='clear:both;'></div>
";



for ( $l=0; $l< 3; $l++ ) {
	if ( $l == 0 ) $first_row = "first-row";
	else $first_row = null;
	
	echo "<div class='row $first_row' menu-content={$l}>";
	$m = 0;
	foreach ( $mmposts[$l] as $p ) {
		$wr_subject = conv_subject( $p['wr_subject'], 12, '...');
		$imgsrc = get_list_thumbnail($p['bo_table'], $p['wr_id'], 105, 69);
		if ( $imgsrc['src'] ) {
			$img = "<img src='$imgsrc[src]'/>";
		} else if ( $image_from_tag = g::thumbnail_from_image_tag( $p['wr_content'], $p['bo_table'], 105, 69 )) {
		$img = "<img class='img_left' src='$image_from_tag'/>";
		} else $img = "<img src='".x::url_theme()."/img/no_image.png' />";
		
		$url = G5_BBS_URL . '/board.php?bo_table='.$p['bo_table'].'&wr_id='.$p['wr_id'];
		
		echo "<div class='photo'><a href='$url'>$img</a></div>";
		$m++;
	}
		for ( $i=0; $i < ( 5 - $m ); $i++ ) {
			echo "<div class='photo'><img src='".x::url_theme()."/img/no_image.png' /></div>";
		}
	echo "<div style='clear:left;'></div>
		</div>";
}
echo "</div>";