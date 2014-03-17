<div class='mobile-title-bar'>
	<img src='<?=x::url_theme()?>/img/latest_post_icon.png'/>최근글
</div>
<?

for ( $i=1; $i <=10; $i++ ) {
	$forum_name = x::meta('latest_forum_no_'.$i);
	$no_of_posts = x::meta('latest_no_of_posts_'.$i);
	if ( empty($no_of_posts) || ($no_of_posts == 0) ) $no_of_posts = 3;
	if ( $forum_name ) {
		echo mobile_latest_posts ( 	array( 'width' => 210, 'height' => 80, 'radius'	=> 0, 'icon' => x::url_theme().'/img/category-icon.png', ),
									array( 'bo_table' => $forum_name, 'no_of_posts' => $no_of_posts, ));
	}
}

function mobile_latest_posts( $options, $config ) { ?>
	<div class='latest_posts'>
		<?=latest( 'x-rwd-gallery-2-mobile-latest-posts', $config['bo_table'] , $config['no_of_posts'], 40, 1, $options )?>
	</div>
<?}?>