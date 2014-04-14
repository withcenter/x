<div class='banner'>
	<?include 'gallery4_banner.php'?>
</div>

<div class='middle-banner-wrapper'>
	<div class='middle-banner'>
		<img src="<?=x::theme_url('img/no_banner.png')?>"/>
	</div>
</div>

<div class='post-full-image-wrapper'>
	<div class='inner'>
		<div class='panel-titles'>Panel Title</div>
		<?
			$posts_full_image = x::menus('left'); 
			$title_colors = array( '#ff9b38', '#ffaf30', '#ec5c60', '#bb8df4', '#ff7271', '#ffaf30', '#ff7271', '#b1c516', '#70bcd2', '#8ba6ff' );
			$color = 0; $i = 0;
			echo "<div class='image-menu-wrapper' style='background: url(".x::theme_url('img/menu_container_bg.png').")'>
					<div class='inner'>
						<div class='left_arrow'><img src='".x::theme_url('img/left_arrow.png')."'/></div>
							<div class='image-menu'>";
								foreach ( $posts_full_image as $menu ) { ?>
									<span class='image-menu-name' menu_name="<?=$menu['url']?>">
										<span class='inner <? if ( $i++ == 0 ) echo "selected"?>'>
											<div class='menu-photo'>
												<img src="<?=x::theme_url('img/menu1_noimage.png')?>"/>
												<div class='menu-overlay'><?=$menu['name']?></div>
											</div>
											<?=$menu['name']?>
										</span>
									</span> <? } ?>
								<div style='clear: left'></div>
							</div>
						<div class='right_arrow'><img src='<?=x::theme_url('img/right_arrow.png')?>'/></div>
						<div style='clear: left'></div>
					</div>
				</div>
			<?
			foreach ( $posts_full_image as $forum ) { 
				$option = array(
					"width" => 270,
					"height" => 280,
					"background-color" => $title_colors[$color++],
				);
			?>
				<div class='post-full-image <? if ( $color == 1 ) echo "selected"?> <?=$forum['url']?>'>
					<?=latest('x-latest-gallery4-post-full-image', $forum['url'], 3, 25, $cache_time=1, $option)?>
				</div>
			<?}?>
	</div>
</div>

<div class='post-with-image-wrapper'>
	<div class='post-with-image'>	
		<div class='panel-titles'>Panel Title</div>
	<?
		$option = array(

			"width" => 245,
			"height" => 179,

		);
	?>
		<?=latest('x-latest-gallery4-post-with-image', bo_table(2), 4, 25, $cache_time=1, $option)?>
	</div>
</div>


<div class='post-with-image-2-wrapper'>
		<div class='panel-titles outer'>Panel Title</div>
	<div class='inner'>
		<?	
			$i = 0;
			$posts_image_2 = x::menus('right'); 
			?>
			<div class='image2-menu-wrapper'>
			
				<div class='image-2-previous'><img src="<?=x::theme_url('img/image2_left_arrow.png')?>"/></div>
			
				<div class='image-2-menu'><?
					foreach ( $posts_image_2 as $menu ) { ?> 
						<span class='image2-menu-name <? if ( $i++ == 0 ) echo "selected first-menu"?>' menu2_name="<?=$menu['url']?>">
							<span class='inner'>
								<img src="<?=x::theme_url('img/category_'.$i.'.png')?>" class='not-active-background'/>
								<img src="<?=x::theme_url('img/category_'.$i.'b.png')?>" class='active-background'/>
								<div class='menu2_name'><?=$menu['name']?></div>
							</span>
						</span> <? } ?>
					<div style='clear: left'></div>
				</div>
				
				<div class='image-2-next'><img src="<?=x::theme_url('img/image2_right_arrow.png')?>"/></div>
				<div style='clear: left'></div>
				
			</div>
			<? $i = 0;
			foreach ( $posts_image_2 as $post ) {
				$option = array(

					"width" => 170,
					"height" => 360,

				);
		?>
		<div class='post-with-image-2 <?=$post['url']?> <? if ( $i++ == 0 ) echo "selected"?>'>
			<?=latest('x-latest-gallery4-posts-with-image-2', $post['url'], 10, 25, $cache_time=1, $option)?>
		</div>	
		<? } ?>
	</div>
</div>

<div class='latest-comments-wrapper'>
	<div class='inner'>
		<div class='panel-titles'>Panel Title</div>
	<?
		$latest_comments = g::posts(array( 'wr_is_comment' => '1', 'limit' => '4' ));
			foreach ( $latest_comments as $comments ) {
				$comments_list[] = db::row("SELECT wr_id, wr_content, wr_name, wr_email, wr_datetime, mb_id FROM $g5[write_prefix]".$comments['bo_table']." WHERE wr_id='".$comments['wr_id']."'");
			}
		$i = 1;
		foreach ( $comments_list as $comment ) { ?>
			<div class='latest-comments comment_<?=$i++?>'>
				<div class='inner'>
					<span class='post-comment'><?=$comment['wr_content']?></span>
					<span class='comment-author'>by <?=$comment['wr_name']?></span>
				</div>
			</div>
		<? } ?>
		<div style='clear: left'></div>
	</div>
</div>

<div class='bottom-latest-posts'>
	<div class='inner'>
		<div class='title'>
			<div class='top_title panel-titles'>TITLE HERE</div>
			<div class='top_title icon_titles'>Android<img src = "<?=x::theme_url('img/android.png')?>" /></div>
			<div class='top_title icon_titles'>IOS<img src = "<?=x::theme_url('img/ios.png')?>" /></div>
			<div class='top_title icon_titles'>Tablet<img src = "<?=x::theme_url('img/tablet.png')?>" /></div>
			<div class='top_title icon_titles'>Mobile<img src = "<?=x::theme_url('img/mobile.png')?>" /></div>
		</div>
		<div class='post_wrapper'>
			<div class='left'>
				<?=latest("x-gallery-4-lower-posts",bo_table(1),5,10)?>
			</div>
			<div class='right'>
				<?=latest("x-gallery-4-lower-posts",bo_table(2),5,10)?>
			</div>
			<div style='clear:both'></div>			
		</div>		
	</div>
</div>