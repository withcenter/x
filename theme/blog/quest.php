<?php
	if ( ! admin() ) return;
	
	for ( $i = 1; $i <= 4 ; $i++) { 
		if ( file_exists( x::path_file( "banner_$i" ) ) ) break;
	}
	if ( $i == 5 ) {
		$url = url_site_config( null, 'site', 'config_global' ) . '#logo_banner';
		echo quest("
			<a href='$url'>잠깐! 메인 페이지의 베너를 등록하지 않으셨네요... ㅡㅡ; &nbsp; 지금 바로 배너를 등록해 보세요. ^^;</a>
		");
	}
	