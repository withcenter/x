<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/bars.png'/>NEW WEBSITES</div>
		<div class='inner'>
		<?
		$q = "SELECT * FROM x_multisite_config ORDER BY stamp_create DESC LIMIT 3";
		$queries = db::rows($q);
		//di($queries);
		foreach ( $queries as $query ) {
		if( $query['title'] == '' ) $query['title'] = 'No Title';				
		
		if( $_SERVER['https'] ) $is_ssl = "https://";
		else $is_ssl = "http://";
		
		$site_url = $is_ssl.$query['domain'];
		?>
		<div class='info-wrapper'>
			<div class='top-info site-domain'><a href='<?=$site_url?>'><?=$query['domain']?></a></div>
			<div class='other-info site-owner'><a href='<?=$site_url?>'>Owned by: <?=$query['mb_id']?></a></div>
			<div class='other-info site-title'><a href='<?=$site_url?>'><?=$query['title']?></a></div>
		</div>
		<?}?>		
	</div>
	<div class='view-more'><a href="#">VIEW MORE</a></div>
</div>