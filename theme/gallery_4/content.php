<div class='post-full-image-wrapper'>
	<?
		$posts_full_image = x::menus('left'); 
		$title_colors = array( '#ff9b38', '#ffaf30', '#ec5c60', '#bb8df4', '#ff7271', '#ffaf30', '#ff7271', '#b1c516', '#70bcd2', '#8ba6ff' );
		$color = 0; $i = 0;
		echo "<div class='image-menu-wrapper'>";
		foreach ( $posts_full_image as $menu ) { ?> <span class='image-menu-name' menu_name="<?=$menu['url']?>"><span class='inner <? if ( $i++ == 0 ) echo "selected"?>'><?=$menu['name']?></span></span> <? } ?>
		<div style='clear: left'></div>
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