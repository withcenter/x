<?php
	widget_css();
	// widget_javascript();
	
	
	$extra = null;
	$ids = array();
	$url = null;
	for ( $i=1; $i<=5; $i++ ) {
		if ( empty($widget_config["forum$i"]) ) continue;
		$ids[] = "bo_table='".$widget_config["forum$i"]."'";
		if ( $url == null ) $url = url_forum_list( $widget_config["forum$i"] );
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
	
	if ( $widget_config['url'] ) $url = $widget_config['url'];
	
	$path = widget_data_path( $widget_config['code'], 'icon' );
	$url_icon = widget_data_url( $widget_config['code'], 'icon' );
	if ( $widget_config['target'] ) $target="target='$widget_config[target]'";

?>
<div class="post-latest">
	<div class='title'>
		<? if ( file_exists( $path ) ) { ?><img src="<?=$url_icon?>" style="width:24px; height:24px;"><? } ?>
		<a href="<?=$url?>" <?=$target?>>
			<?=$widget_config['title']?>
		</a>
	</div>
	<? foreach ( $posts as $post ) { ?>
		<?php
			if ( $post['wr_comment'] ) $count_comment = "($post[wr_comment])";
			else $count_comment = '';
		?>
		<div class='post'>
			<a href='<?=$post['url']?>' <?=$target?>>
				<?=$post['subject']?>
				<?=$count_comment?>
			</a>
		</div>
	<? } ?>
</div>

<? if ( ! empty($widget_config['css']) ) { ?>
<style>
<?=$widget_config['css']?>
</style>
<? } ?>
