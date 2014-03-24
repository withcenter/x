<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
	<!--[if lt IE 9]>
		<script type='text/javascript' src='<?php echo G5_URL ?>/x/js/jquery-1.11.0.min.js'></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type='text/javascript' src='<?php echo G5_URL ?>/x/js/jquery-2.1.0.min.js'></script>
	<!--<![endif]-->
</head>
<body>
<?php
	$url = URL_EXTENDED . '/x/etc/rss-update-list.php';
	
	
	// di($url);
	
	
	$rss = load_xml( $url );
	
	//di( $rss );
	
	
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
</body>
</html>

