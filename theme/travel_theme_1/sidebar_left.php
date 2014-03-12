<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/sidebar_left.css' />

<div class='travel2-company-banner'>
	<a href='http://www.philgo.com' target='_blank'><img src='<?=x::url_theme().'/img/no_company_banner.png'?>' style='border:0;' /></a>
</div>

<div class='posts-left-1'>
	<? $option = array('no' => 14 ); ?>
	<?=latest('x-latest-travel-2-posts', ms::board_id(etc::domain()).'_1' , 14 , 20, 1, $option)?>
</div>

<div class='banner-left'>
	<?
	if ( file_exists( x::path_file ( 'travel_left_banner' ) ) ) {
		if ( !$url = x::meta('travel_left_banner_url') ) $url = 'javascript:void(0)';
		
		echo "<a href='$url' target='_blank'><img src='".x::url_file('travel_left_banner')."'></a>";
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