<link rel="stylesheet" href="<?=x::theme_url()?>/css/forum_tab.css">
<div class='forum-tab'>
<?php
	$option = array(
					'icon' => x::url_theme().'/img/panel.png'
				);
	$forum_tab_name = array('a','b','c','d');
	for ( $i=1; $i <=4; $i++ ) {
		${"middle_forum_".$i} = x::meta('middle_forum_'.$i);
		if ( empty(${"middle_forum_".$i}) ) ${"middle_forum_".$i} = bo_table($i);
		echo forum_tab($forum_tab_name[$i-1], ${"middle_forum_".$i}, $option);
	}
	
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
