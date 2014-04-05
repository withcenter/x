<?php
	widget_css();
	// widget_javascript();
	
	
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
?>
<div class="post-latest">
	<div class='title'><?=$widget_config['title']?></div>
	<? foreach ( $posts as $post ) { ?>
		<div class='post'><a href='<?=$post['url']?>'><?=$post['subject']?></a></div>
	<? } ?>
</div>

<? if ( ! empty($widget_config['css']) ) { ?>
<style>
<?=$widget_config['css']?>
</style>
<? } ?>
