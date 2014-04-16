<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/sidebar.css' />
<div class='login'>
<?=outlogin('x-outlogin-travel_3') ?>
</div>

<div class='company-banner'>
	<a href='http://www.philgo.com' target='_blank'><img src='<?=x::url_theme().'/img/company_banner.png';?>' style='border:0;'></a>
</div>

<div class='comm3-posts-wrapper'>
<?//=latest('x-latest-community3-posts',  bo_table(1) , 4 , 20)?>
	<?
		include widget(
			array(
				'code'		=> 'latest-community3-posts',
				'name'		=> 'latest-community3-posts',
				'git'		=> 'https://github.com/x-widget/latest-community3-posts',
			)
		);
	?>
</div>

<? //include x::theme('popular_posts') ?>
<?
	include widget(
		array(
			'code'		=> 'community-3-popular-posts',
			'name'		=> 'community-3-popular-posts',
			'git'		=> 'https://github.com/x-widget/community-3-popular-posts',
		)
	);
?>

<? //include( x::theme('latest_posts') ) ?>

<?
	include widget(
		array(
			'code'		=> 'community-3-latest-posts-all',
			'name'		=> 'community-3-latest-posts-all',
			'git'		=> 'https://github.com/x-widget/community-3-latest-posts-all',
		)
	);
?>