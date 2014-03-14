<div class='site-list'><div class='inner'>
	<div class='title'>사이트 목록</div>
	<?php
	$rows = db::rows ( "SELECT domain, mb_id, stamp_create, title FROM x_multisite_config ORDER BY stamp_create DESC" );

	foreach ( $rows as $row ) {
		$url_site = ms::url_site( $row['domain']);
		$create_date = date( 'Y-m-d H:i:s A', $row['stamp_create'] );
		echo "
			<div class='sites'>
				<div>
					<span class='item2'>사이트 제목</span>
					<a href='$url_site' target='_blank'>$row[title]</a>
				</div>
				<div>
					<span class='item2'>사이트 주소</span>
					<a href='$url_site' target='_blank'>$row[domain]</a>
				</div>
				<div>
					<span class='item2'>만든이</span>
					<a href='$url_site' target='_blank'>$row[mb_id]</a>
					<span class='item3'>생성일</span>
					<a href='$url_site' target='_blank'>$create_date</a>
				</div>
				<a class='button move-to-site' href='$url_site' target='_blank'>사이트로 이동</a>
			</div>
		";
	}
	?>
</div></div>