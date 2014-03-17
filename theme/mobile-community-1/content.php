
<div class='gallery'>
<?php
	$gallery_forum = x::meta('top_forum_with_images');
	if ( empty($gallery_forum) ) $gallery_forum = bo_table(1);
	echo latest( 'x-rwd-gallery', $gallery_forum , 40, 40, 1,
		array(
			'width'		=> 240,
			'height'	=> 180,
			'radius'	=> 0,
		)
	);
?>
</div>

<?
	include 'forum_tab.php';
?>
<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = x::meta('bottom_forum_1');
		if( empty($latest_bo_table) ) $latest_bo_table = bo_table(1);
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-rwd-text-with-thumbnail", $latest_bo_table, 4, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers_2.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = x::meta('bottom_forum_2');
		if( empty($latest_bo_table) ) $latest_bo_table = bo_table(2);	
			echo latest("x-rwd-text-with-thumbnail", $latest_bo_table, 4, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/panel_2.png"))
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>
