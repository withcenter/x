<?php
/*
	$posts = x::posts( array( 
		'bo_table'				=> 'default',
		'wr_link1'				=> array( 'IS NOT NULL' ),
		'limit'=>5,
		'select' => '*',
		
	) );
	*/
	
	$url = URL_EXTENDED . '/x/etc/rss-update-list.php';
	
	
	di($url);
	
	$rss = load_xml( $url );
	
	
	
	// https://github.com/withcenter/theme-sample/blob/master/preview.jpg
	// =>
	// https://raw.githubusercontent.com/withcenter/theme-sample/master/preview.jpg
	foreach ( $rss['channel']['item'] as $p ) {
	
		$u = parse_url($p['link']);
		$host = "raw.githubusercontent.com";
		$url_preview = "$u[scheme]://$host$u[path]/master/preview.jpg";
		$url_config = "$u[scheme]://$host$u[path]/master/config.xml";
		@$theme_config = load_config( $url_config );
		
		if ( empty($theme_config) ) continue;
		echo "
			<div class='theme'>
				<img src='$u[scheme]://$host$u[path]/master/preview.jpg'><br>
				{$theme_config[name][L]}<br>
				{$theme_config[short][L]}<br>
			</div>
		";
		flush();
	}
?>
