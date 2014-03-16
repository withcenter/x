<div class='page-header'>
	생성된 사이트 목록
</div>
<div class='content'>
<?
	$rows = db::rows("SELECT * FROM x_site_config ORDER BY `domain`");
	
	
	
	foreach ( $rows as $row ) {
		if ( $row['domain'][0] == '.' ) continue;
		$url = site_url( $row['domain'] );
		$title = meta_get( $row['domain'], 'title' );
		$theme = meta_get( $row['domain'], 'theme' );
		
		echo "
			<div>
				<a href='$url' target='_blank'>$row[domain] : $title , $theme</a>
			</div>
		";
	}
?>
</div>
