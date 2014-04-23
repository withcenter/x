
<div class='gallery'>
<?php		
	include widget(
		array(
			'code'		=> 'x-rwd-gallery',
			'name'		=> 'x-rwd-gallery',
			'default_forum_id' => bo_table(1),
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
						'default_forum_id' => bo_table($forum_count+2),
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
			include widget(
				array(
					'code'		=> 'x-rwd-text-with-thumbnail-left',
					'name'		=> 'x-rwd-text-with-thumbnail',
					'default_forum_id' => bo_table(6),
					'git'		=> 'https://github.com/x-widget/x-rwd-text-with-thumbnail',
				)
			);
		?>
		</div>
	</div>
	<div class='right'>
		<div class='inner'>
		<?
			include widget(
				array(
					'code'		=> 'x-rwd-text-with-thumbnail-right',
					'name'		=> 'x-rwd-text-with-thumbnail',
					'default_forum_id' => bo_table(7),
					'git'		=> 'https://github.com/x-widget/x-rwd-text-with-thumbnail',
				)
			);
		?>
		</div>
	</div>
	<div style='clear:both;'></div>			
</div>
