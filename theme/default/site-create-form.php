
<div class='page-header'>
사이트 생성
</div>


			<form action='?'>
				<input type='hidden' name='module' value='multi'>
				<input type='hidden' name='action' value='site_create_submit'>
					<div><span class='item'>사이트 주소</span> http://<input type='text' name='sub_domain'>.<?=etc::base_domain()?></div>
					<div><span class='item'>사이트 제목</span> <input type='text' name='title'></div>
					
					
					<input type='submit' value='생성'>
					<div style='clear:right;'></div>
			</form>
			
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
	