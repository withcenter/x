<div class='post-full-image'>
<?
	$option = array(

		"width" => 270,
		"height" => 280,
		"background-color" => "#ff9b38",

	);
?>
	<?=latest('x-latest-gallery4-post-full-image', bo_table(3), 3, 25, $cache_time=1, $option)?>
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