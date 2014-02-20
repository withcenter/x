<?=outlogin('x-outlogin-community') ?>	
<div class='company-banner'>
	<?if( ms::meta('companybanner_1') ) $company_banner = ms::meta('img_url').ms::meta('companybanner_1');
	else $company_banner = x::url_theme().'/img/community_company_banner.png';?>
	<img src="<?=$company_banner?>">
</div>

<div class='sidebar-banner'>
	<?if( ms::meta('combanner_sidebar_text1') ) echo "<div class='sidebar-banner-title'>".ms::meta('combanner_sidebar_text1')."</div>"; ?>
	<?if( ms::meta('combanner_sidebar') ) $sidebar_banner = ms::meta('img_url').ms::meta('combanner_sidebar');
	else $sidebar_banner = x::url_theme().'/img/community_sidebar_banner.png';?>
	<img src="<?=$sidebar_banner?>">
</div>