<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/sidebar.css' />
<?
$begin_date = date('Y-m-d H:i:s', time() - ( 60 * 60 * 24 * 30));

for ( $i = 1 ; $i <= 10; $i++ ) {
	${'forum_'.$i} = ms::meta('forum_no_'.$i);
}

?>

<?=outlogin('x-outlogin-community-3') ?>

<div class='company-banner'>
	<?
	if ( $company_banner = ms::meta('com3banner_company') ) $imgsrc = ms::meta('img_url').$company_banner;
	else $imgsrc = x::url_theme().'/img/company_banner.png';
	?>
	<img src='<?=$imgsrc?>'>
</div>

<?=latest('x-latest-community3-posts', $forum_1 , 6 , 20)?>
<? include x::theme('popular_posts') ?>
<!--<? include x::theme('latest_comments') ?> //Removed in the new design-->

<?
if ( $company_banner = ms::meta('com3banner_sidebar') ) { ?>
<div class='sidebanner'>
	<?$imgsrc = ms::meta('img_url').$company_banner?>
	<img src='<?=$imgsrc?>'>
</div>
<?}?>

<? include( x::theme('latest_posts') ) ?>