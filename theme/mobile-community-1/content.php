
<div class='gallery'>
<?php		
	include widget(
		array(
			'code'		=> 'x-rwd-gallery',
			'name'		=> 'x-rwd-gallery',
			'git'		=> 'https://github.com/x-widget/x-rwd-gallery',
		)
	);
?>
</div>

<div class='forum_tab_wrapper'> 
	<?for( $forum_count = 0; $forum_count < 4; $forum_count++ ){?>
	<div class='forum-tab-posts item_<?=$forum_count?>'>
		<div class='forum-tab-inner'>
			<?php		
				include widget(
					array(
						'code'		=> 'x-latest-rwd-community-1-item-'.$forum_count,
						'name'		=> 'x-latest-rwd-community-1',
						'git'		=> 'https://github.com/x-widget/x-latest-rwd-community-1',
					)
				);
			?>
		</div>
	</div>
<?}?>
<div style='clear:both'></div>
</div>

<div class='latest-thumbnail'>
	<div class='left'>
		<div class='inner'>
		<?
		$latest_bo_table = x::meta('bottom_forum_1');
		if( empty($latest_bo_table) ) $latest_bo_table = bo_table(2);
		if ( g::forum_exist( $latest_bo_table ) ) {
			echo  latest("x-rwd-text-with-thumbnail", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/2papers_2.png"));
		}
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
		$latest_bo_table = x::meta('bottom_forum_2');
		if( empty($latest_bo_table) ) $latest_bo_table = bo_table(3);	
			echo latest("x-rwd-text-with-thumbnail", $latest_bo_table, 5, 50, $cache_time=1, array('icon'=>x::url_theme()."/img/panel_2.png"))
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>
