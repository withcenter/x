<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?=module("$module.css")?>">
	<!--[if lt IE 9]>
		<script type='text/javascript' src='<?php echo G5_URL ?>/x/js/jquery-1.11.0.min.js'></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type='text/javascript' src='<?php echo G5_URL ?>/x/js/jquery-2.1.0.min.js'></script>
	<!--<![endif]-->
</head>
<body>
<div class='theme-list'>
<div>
<?php
	
?>
	<?=lang(
		"Please, wait for sometime. Themes are being downloaded from GITHUB.COM",
		"GITHUB.COM 으로 부터 자료를 다운로드 중입니다. 다운로드 시간이 걸릴 수 있으므로 기다려 주십시오."
		)?>
		</div>
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

		
		//di($url_config);
		$theme_config = load_xml( $url_config );
		
		
		if ( empty($theme_config) ) continue;
		$a = explode('/', $p['link']);
		$pname = $a[ count($a) - 1 ];


		if ( in_array( $pname, $in['dirs'] ) ) {
			$installed = "설치됨";
		}
		else {
			$installed = lang("INSALL", "설치하기");
		}

		$source_link = urlencode( $p['link'] );
		echo "
			<div class='theme'>
				<img src='$u[scheme]://$host$u[path]/master/preview.jpg'><br>
				{$theme_config[name][L]}<br>
				<a href='?module=update&action=ftp_install&source_link=$source_link'>{$installed}</a>
<br>
				{$theme_config[short][L]}<br>
			</div>
		";
		flush();
	}
?>
</div>
</body>
</html>

