<?php
	if ( ! admin() ) return;
	widget_css();
	// widget_javascript();
	
	
	
	
	$posts = x::posts(
		array(
			
		)
	);
	
?>
<div class="post-latest">
	<div class='title'><?=$wo['title']?></div>
	<? foreach ( $posts as $post ) { ?>
		<div class='post'><a href='<?=$post['url']?>'><?=$post['subject']?></a></div>
	<? } ?>
</div>
