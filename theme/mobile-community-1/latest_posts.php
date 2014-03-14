<div class='mobile-title-bar'>
	<img src='<?=x::url_theme()?>/img/latest_post_icon.png'/>최근글
</div>

<div class='latest_posts'>
<?php
	echo latest( 'x-rwd-gallery-2-mobile-latest-posts', bo_table(1) , 40, 40, 1,
		array(
			'width'		=> 214,
			'height'	=> 170,
			'radius'	=> 0,
		)
	);
?>
</div>