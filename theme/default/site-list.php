<div class='page-header'>
	생성된 사이트 목록
</div>

<?
	$rows = db::rows("SELECT * FROM x_config WHERE code='theme' ORDER BY `key`");
	foreach ( $rows as $row ) {
		if ( $row['key'][0] == '.' ) continue;
		$url = site_url( $row['key'] );
		echo "
			<div>
				<a href='$url' target='_blank'>$row[key] : $row[value]</a>
			</div>
		";
	}
	