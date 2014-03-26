<?php

	$url = URL_EXTENDED . '/x/etc/rss-update-list.php';
	
	return;
	
	// di($url);
	
	
	$rss = load_xml( $url );
	
	//di( $rss );
	
	/**
	 *  로컬에서 직접 다운로드하고 FTP 로 로컬에서 로컬로 업로드한다면,
	 *  로컬에
	 *  	SSL 모듈이 등록되어져 있어야 하며,
	 *  	원격 파일 오픈(fopen, include, file 등) 이 되어져 있어야  하며
	 *  	FTP 설정 등
	 *  	각종 설정이 되어져 있어야 한다.
	 *  이것을
	 *  원격에서 다운로드하고, FTP 로 원격에서 로컬로 업데이트 한다면
	 *  위와 같은 설정은 필요가 없다.
	 *  
	 *  그래서... 원격으로 할 것인가?
	 *  
	 */
	
	// https://github.com/withcenter/theme-sample/blob/master/preview.jpg
	// =>
	// https://raw.githubusercontent.com/withcenter/theme-sample/master/preview.jpg
	foreach ( $rss['channel']['item'] as $p ) {
	
	
		$u = parse_url($p['link']);
		$host = "raw.githubusercontent.com";
		$url_preview = "$u[scheme]://$host$u[path]/master/preview.jpg";
		$url_config = "$u[scheme]://$host$u[path]/master/config.xml";
		
		di($url_config);
		$theme_config = load_xml( $url_config );
		
		
		if ( empty($theme_config) ) continue;
		
		$url_install = "?module=update&action=admin_ftp&mode=install&dir=theme";
		
		echo "
			<div class='theme'>
				<img src='$u[scheme]://$host$u[path]/master/preview.jpg'><br>
				{$theme_config[name][L]}

				[ 업데이트 하기 | <a href=''>추가 하기</a> ]
				
				
				
				<br>
				{$theme_config[short][L]}<br>
			</div>
		";
		flush();
	}
?>
