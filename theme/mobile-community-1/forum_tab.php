<link rel="stylesheet" href="<?=x::theme_url()?>/css/forum_tab.css">
<div class='forum-tab'>
<?php
	echo forum_tab('a', 'ms_test6_1');
	echo forum_tab('b', 'ms_test6_2');
	echo forum_tab('c', 'freetalk');
	echo forum_tab('d', 'ms_test6_6');
	
function forum_tab( $cls, $id ) {
	$posts = g::posts( array( 'bo_table' => $id, 'limit'=>5 ) );
	$ret .= "<div class='$cls'><div class='forum-tab-inner'>";
	foreach ( $posts as $p ) {
		$ret .= "<div class='subject'><a href='$p[href]'>$p[wr_subject]</a></div>";
	}
	$ret .= "</div></div>";
	return $ret;
}
?>
<div style='clear:both;'></div>
</div>
