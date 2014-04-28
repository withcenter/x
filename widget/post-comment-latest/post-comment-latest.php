<?php

	widget_css();
	// widget_javascript();
	
	$extra = null;
	$ids = array();
	for ( $i=1; $i<=5; $i++ ) {
		if ( empty($widget_config["forum$i"]) ) continue;
		$ids[] = "bo_table='".$widget_config["forum$i"]."'";
	}
	if ( $ids ) {
		$extra = "(" . implode( " OR ", $ids ) . ")";
	}
	$posts = x::posts(
		array(
			'extra'			=> $extra,
			'limit'			=> $widget_config['no'],
		)
	);
	
	
	$posts = x::posts(
		array(
			'extra'			=> $extra,
			'limit'			=> $widget_config['no'],
			'select'				=> x::SELECT_DEFAULT_WITH_CONTENT,
			'wr_is_comment'	=> 1
		)
	);
	
	$latest_comment_title = $widget_config['title'];
	if ( !$latest_comment_title ) $latest_comment_title = "Latest Comments";
	
?>
<div class="post-comment-latest">
	<div class='title'><?=$latest_comment_title?></div>
	<div class='comments-list'>
		<? 	$i = 1;
			foreach ( $posts as $post ) { ?>
				<div class='post <? if ( $i++ == 1 ) echo "first_post" ?>'><a href='<?=$post['url']?>'><?=$post['content']?></a></div>
		<? } ?>
	</div>
</div>
