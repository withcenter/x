<div class='mobile-title-bar'>
	<img src='<?=x::url_theme()?>/img/latest_post_icon.png'/>최근글
</div>
<?
	echo mobile_latest_posts ( 	array( 'width' => 210, 'height' => 80, 'radius'	=> 0, 'icon' => x::url_theme().'/img/category-icon.png', ),
								array( 'bo_table' => bo_table(1), 'no_of_posts' => 3, ));
	echo mobile_latest_posts ( 	array( 'width' => 210, 'height' => 80, 'radius'	=> 0, 'icon' => x::url_theme().'/img/category-icon.png', ),
								array( 'bo_table' => bo_table(2), 'no_of_posts' => 3, ));

function mobile_latest_posts( $options, $config ) { ?>
	<div class='latest_posts'>
		<?=latest( 'x-rwd-gallery-2-mobile-latest-posts', $config['bo_table'] , $config['no_of_posts'], 40, 1, $options )?>
	</div>
<?}?>