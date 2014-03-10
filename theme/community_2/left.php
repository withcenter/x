<?=outlogin('x-outlogin-community-2')?>
<div class='company-banner'>
	<a href='http://www.philgo.com' target='_blank'>
	<?	if ( !ms::meta('com2banner_company') ) $banner_company = x::url_theme().'/img/company_banner.png';
		else $banner_company = ms::meta('img_url').ms::meta('com2banner_company');
	?>
		<img src="<?=$banner_company?>" style='border:0;' />
	</a>
</div>
<?php
include 'popular.posts.php';

include 'new.posts.php';
