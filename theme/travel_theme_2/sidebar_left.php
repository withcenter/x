<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/sidebar_left.css' />
<?php
for ( $i = 1 ; $i <= 10; $i++ ) {
	${'forum_'.$i} = ms::meta('forum_no_'.$i);
}
?>

<div class='travel2-company-banner'>
	<?
	if( $company_banner = ms::meta('travel2banner_company') ) $imgsrc = ms::meta('img_url').$company_banner;
	else $imgsrc = x::url_theme().'/img/no_company_banner.png';
	?>
	<img src='<?=$imgsrc?>'/>
</div>

<div class='posts-left-1'>
	<? $option = array('no' => 14 ); ?>
	<?=latest('x-latest-travel-2-posts', $forum_1 , 14 , 20, 1, $option)?>
</div>

<div class='banner-left'>
	<?
	$banner_url = ms::meta('img_url');
	$url = ms::meta('travel2banner1_sidebar_text1');
	$banner_image = ms::meta( 'travel2banner1_sidebar' );
	if ( $banner_image ) {
		echo "<a href='$url' target='_blank'><img src='".$banner_url.$banner_image."'></a>";
	}
	else {?>
		<a href='javascript:void(0)' ><img src='<?=x::url_theme()?>/img/no_side_banner.png'></a>
	<?}?>
</div> 

<div class='exchange-rate-wrapper'>
	<div class='title'>
		<img src='<?=x::url_theme()?>/img/exchange-rate.png'><a href='http://search.naver.com/search.naver?where=nexearch&query=%ED%99%98%EC%9C%A8&sm=top_hty&fbm=1&ie=utf8' target='_blank'><b>환율 정보</b></a>
	</div>
	<div class='exchange-rate'>
		<?include "exchange_rate.php"?>
	</div>
</div>