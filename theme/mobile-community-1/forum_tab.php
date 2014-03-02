<link rel="stylesheet" href="<?=x::theme_url()?>/css/forum_tab.css">
<div class='forum-tab'>
<?php
	echo forum_tab('a', 'ms_test6_1');
	echo forum_tab('b', 'ms_test6_2');
	echo forum_tab('c', 'freetalk');
	
function forum_tab( $cls, $id ) {
	$posts = g::posts( array( 'bo_table' => $id ) );
	$ret .= "<div class='$cls'><div class='forum-tab-inner'>";
	foreach ( $posts as $p ) {
		$ret .= "<div>$p[wr_subject]</div>";
	}
	$ret .= "</div></div>";
	return $ret;
}
?>
<div style='clear:both;'></div>
</div>
