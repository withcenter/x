<div class='mobile-title-bar'>
	<img src='<?=x::url_theme()?>/img/gallery-icon.png'/>갤러리
</div>

<div class='gallery_posts'>
<?php
	echo latest( 'x-rwd-gallery-2', bo_table(1) , 40, 40, 1,
		array(
			'width'		=> 214,
			'height'	=> 170,
			'radius'	=> 0,
		)
	);
?>
</div>