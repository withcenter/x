<?php
	if ( ! admin() ) return;
	if ( ! file_exists( path_logo() ) ) {
		$url = url_site_config( null, 'site', 'config_global' ) . '#logo_banner';
		echo quest("
			<a href='$url'>잠깐! 홈페이지 로고를 등록하지 않으셨네요... ㅡㅡ; &nbsp; 로고를 등록해 보세요.</a>
		");
	}
	
	for ( $i = 1; $i <= 5 ; $i++) { 
		if ( file_exists( x::path_file( "banner$i" ) ) ) break;
	}
	if ( $i == 6 ) {
		$url = url_site_config( null, 'site', 'config_global' ) . '#logo_banner';
		echo quest("
			<a href='$url'>잠깐! 메인 페이지의 베너를 등록하지 않으셨네요... ㅡㅡ; &nbsp; 지금 바로 배너를 등록해 보세요. ^^;</a>
		");
	}
	