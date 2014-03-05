<link rel="stylesheet" href="<?=x::theme_url()?>/css/forum_tab.css">
<div class='forum-tab'>
<?php

	echo forum_tab('a', ms::board_id() . '_1');
	echo forum_tab('b', ms::board_id() . '_2');
	echo forum_tab('c', ms::board_id() . '_3');
	echo forum_tab('d', ms::board_id() . '_9');
	
function forum_tab( $cls, $id ) {
	
	
	if ( ! g::forum_exist( $id ) ) $id = 'default';
	$ret .= "<div class='$cls'><div class='forum-tab-inner'>";
	$ret .= latest( 'x-rwd-basic', $id);
	$ret .= "</div></div>";
	return $ret;
}
?>
<div style='clear:both;'></div>
</div>
