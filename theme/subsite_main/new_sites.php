<div class='left-menu-wrapper'>
	<div class='header'><img src='<?=x::url_theme()?>/img/bars.png'/>신규 사이트</div>
		<div class='inner'>
		<?
		$q = "SELECT * FROM x_site_config ORDER BY stamp_created DESC LIMIT 3";
		$rows = db::rows($q);
		//di($rows);
		foreach ( $rows as $site ) {
			$title = meta_get( $site['domain'], 'title' );
			if ( empty( $title ) ) $title = 'No Title';
			$site_url = site_url( $site['domain'] );
		?>
		<div class='info-wrapper'>
			<div class='top-info site-domain'><a href='<?=$site_url?>' target='_blank'><?=$site['domain']?></a></div>
			<div class='other-info site-owner'><a href='<?=$site_url?>' target='_blank'>만든이: <?=$site['mb_id']?></a></div>
			<div class='other-info site-title'><a href='<?=$site_url?>' target='_blank'><?=$title?></a></div>
		</div>
		<?}?>		
	</div>
	<div class='view-more'><a href="<?=x::url()?>/?module=multi&action=site_list">자세히</a></div>
</div>