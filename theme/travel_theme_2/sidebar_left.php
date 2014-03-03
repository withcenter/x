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

<div class='banner-left'>
	<?
	$banner_url = ms::meta('img_url');
		$url = ms::meta('travel2banner1_sidebar_text1');
		if ( $banner_image = ms::meta( 'travel2banner1_sidebar' )) {
			$banner_img = g::thumbnail_from_image_tag( "<img src='".$banner_url.$banner_image."'>", ms::board_id( etc::domain() ).'_1', 208, 88 );
		} else $banner_img = '';
		echo "<a href='$url' target='_blank'><img src='".$banner_img."'></a>";		
	?>
</div> 

<div class='exchange-rate-wrapper'>
	<div class='title'>
		<img src='<?=x::url_theme()?>/img/exchange-rate.png'><b>환율</b>
	</div>
	<div class='exchange-rate'>
		<iframe src="http://community.fxkeb.com/fxportal/jsp/RS/DEPLOY_EXRATE/381_0.html" width="178" height="136" border="0" frameborder="no" scrolling="no" marginwidth="0" hspace="0" vspace="0"></iframe>
	</div>
</div>