<link rel="stylesheet" href="<?=x::theme_url()?>/css/forum_tab.css">
<div class='forum-tab'>
<?php
	$option = array(
						'icon' => x::url_theme().'/img/panel.png'
						);
	echo forum_tab('a', bo_table(1), $option);
	echo forum_tab('b', bo_table(2), $option);
	echo forum_tab('c', bo_table(3), $option);
	echo forum_tab('d', bo_table(4), $option);
	
function forum_tab( $cls, $id , $option) {
	
	
	if ( ! g::forum_exist( $id ) ) $id = 'default';
	$ret .= "<div class='$cls'><div class='forum-tab-inner'>";
	$ret .= latest( 'x-latest-rwd-community-1', $id, 10, 10, 1, $option);
	$ret .= "</div></div>";
	return $ret;
}
?>
<div style='clear:both;'></div>
</div>
