<?=outlogin('x-outlogin-community') ?>	
<div class='company-banner'>
	<?if( ms::meta('companybanner_1') ) $company_banner = ms::meta('img_url').ms::meta('companybanner_1');
	else $company_banner = x::url_theme().'/img/community_company_banner.png';?>
	<img src="<?=$company_banner?>">
</div>