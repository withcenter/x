<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/sidebar_left.css' />
<?php
for ( $i = 1 ; $i <= 10; $i++ ) {
	${'forum_'.$i} = ms::meta('forum_no_'.$i);
}
?>

<div class='contact-wrapper'>
	<div class='contact-title'><span class='contact-image'><img src='<?=x::url_theme()?>/img/contact-icon.png'></span><b>CUSTOMER CENTER</b></div>
	
	<?
	for( $i=1 ; $i<=2 ; $i++ ) { 
	?>
		<div class='contact-info'>
			<?if($contact_num = ms::meta('travel2contact_num'.$i)) { ?><div class='contact-num'>Tel. No.: <?=$contact_num?></div><?}?>
			<?if($contact_hours = ms::meta('travel2contact_hours'.$i)) { ?><div class='contact-hours'>Office Hours: <?=$contact_hours?></div><?}?>
		</div>
	<?}?>
</div>

<div class='posts-left-1'>
	<?=latest('x-latest-travel-2-posts', $forum_1 , 14 , 20)?>
</div>

<div class='banners-left'>
	<?
	$banner_url = ms::meta('img_url');
	for ($i=1; $i<=3; $i++) {
		$url = ms::meta('travel2banner'.$i.'_sidebar_text1');
		if( $i==2 ) $height = 80;
		else $height = 75;
		if ( $banner_image = ms::meta( 'travel2banner'.$i.'_sidebar' )) {
			$banner_img = g::thumbnail_from_image_tag( "<img src='".$banner_url.$banner_image."'>", ms::board_id( etc::domain() ).'_1', 190, $height );
		} else $banner_img = '';
		$banner_class = 'left-banner-'.$i;
		echo "<a href='$url' target='_blank'><img class='$banner_class' src='".$banner_img."'></a>";		
	}
	?>
</div> 