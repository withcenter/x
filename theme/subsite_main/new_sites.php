<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/bars.png'/>신규 사이트</div>
		<div class='inner'>
		<?
		$q = "SELECT domain, mb_id FROM x_site_config ORDER BY idx DESC LIMIT 3";
		$queries = db::rows($q);
		//di($queries);
		foreach ( $queries as $query ) {
			if ( !$title = x::meta_get( $query['domain'], 'title' ) )  $title = '제목 없음';
			
			$site_url = ms::url_site($query['domain']);
		?>
		<div class='info-wrapper'>
			<div class='top-info site-domain'><a href='<?=$site_url?>' target='_blank'><?=$query['domain']?></a></div>
			<div class='other-info site-owner'><a href='<?=$site_url?>' target='_blank'>만든이: <?=$query['mb_id']?></a></div>
			<div class='other-info site-title'><a href='<?=$site_url?>' target='_blank'><?=$title?></a></div>
		</div>
		<?}?>		
	</div>
	<div class='view-more'><a href="<?=x::url()?>/?module=multi&action=site_list">자세히</a></div>
</div>