<div class='middle-banner-wrapper'>
	<img src="<?=x::theme_url('img/no_banner.png')?>"/>
</div>

<div class='post-full-image-wrapper'>
	<?
		$posts_full_image = x::menus('left'); 
		$title_colors = array( '#ff9b38', '#ffaf30', '#ec5c60', '#bb8df4', '#ff7271', '#ffaf30', '#ff7271', '#b1c516', '#70bcd2', '#8ba6ff' );
		$color = 0; $i = 0;
		echo "<div class='image-menu-wrapper' style='background: url(".x::theme_url('img/menu_container_bg.png').")'>
				<div class='inner'>
					<div class='left_arrow'><img src='".x::theme_url('img/left_arrow.png')."'/></div>
						<div class='image-menu'>";
							foreach ( $posts_full_image as $menu ) { ?> <span class='image-menu-name' menu_name="<?=$menu['url']?>"><span class='inner <? if ( $i++ == 0 ) echo "selected"?>'><?=$menu['name']?></span></span> <? } ?>
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

<div class='post-with-image'>
<?
	$option = array(

		"width" => 245,
		"height" => 179,

	);
?>
	<?=latest('x-latest-gallery4-post-with-image', bo_table(2), 4, 25, $cache_time=1, $option)?>
</div>


<div class='post-with-image-2-wrapper'>
	<?	
		$i = 0;
		$posts_image_2 = x::menus('right'); 
		echo "<div class='image2-menu-wrapper'>";
		foreach ( $posts_image_2 as $menu ) { ?> <span class='image2-menu-name' menu2_name="<?=$menu['url']?>"><span class='inner <? if ( $i++ == 0 ) echo "selected first-menu"?>'><img src="<?=x::theme_url('img/category_'.$i.'.png')?>" class='not-active-background'/><img src="<?=x::theme_url('img/category_'.$i.'b.png')?>" class='active-background'/><div class='menu2_name'><?=$menu['name']?></div></span></span> <? } ?>
		<div style='clear: left'></div>
		</div><?
		$i = 0;
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
