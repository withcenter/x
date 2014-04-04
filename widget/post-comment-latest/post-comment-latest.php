<?php

	widget_css();
	// widget_javascript();
	
	
	
	
	$posts = x::posts(
		array(
			'select'				=> x::SELECT_DEFAULT_WITH_CONTENT,
			'wr_is_comment'	=> 1
		)
	);
	
?>
<div class="post-latest">
	<div class='title'><?=$wc['title']?></div>
	<? foreach ( $posts as $post ) { ?>
		<div class='post'><a href='<?=$post['url']?>'><?=$post['content']?></a></div>
	<? } ?>
</div>
