<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/sidebar.css' />
<?
$begin_date = date('Y-m-d H:i:s', time() - ( 60 * 60 * 24 * 30));
$forum_1 = ms::meta('forum_no_1');
$forum_2 = ms::meta('forum_no_2');
$forum_3 = ms::meta('forum_no_3');
$forum_4 = ms::meta('forum_no_4');
$forum_5 = ms::meta('forum_no_5');
$forum_6 = ms::meta('forum_no_6');
?>

<?=outlogin('x-outlogin-community-3') ?>

<div class='company-banner'>
	<?
	if ( $company_banner = ms::meta('com3banner_company') ) $imgsrc = ms::meta('img_url').$company_banner;
	else $imgsrc = x::url_theme().'/img/company_banner.png';
	?>
	<img src='<?=$imgsrc?>'>
</div>

<?=latest('x-latest-community3-posts', $forum_1 , 5 , 20)?>
<? include x::theme('popular_posts') ?>
<? include x::theme('latest_comments') ?>

<?
if ( $company_banner = ms::meta('com3banner_sidebar') ) { ?>
<div class='sidebanner'>
	<?$imgsrc = ms::meta('img_url').$company_banner?>
	<img src='<?=$imgsrc?>'>
</div>
<?}?>