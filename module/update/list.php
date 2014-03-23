<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?=module('update.css')?>">

	<!--[if lt IE 9]>
		<script type='text/javascript' src='<?=x::url()?>/js/jquery-1.11.0.min.js?version='></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type='text/javascript' src='<?=x::url()?>/js/jquery-2.1.0.min.js?version='></script>
	<!--<![endif]-->
</head>
<body>
<div class='list'>
<?php

	$posts = x::posts( array( 
		'bo_table'				=> 'default',
		'wr_link1'				=> array( 'IS NOT NULL' ),
		'limit'=>5,
		'select' => '*',
		
	) );
	
	// https://github.com/withcenter/theme-sample/blob/master/preview.jpg
	// =>
	// https://raw.githubusercontent.com/withcenter/theme-sample/master/preview.jpg
	foreach ( $posts as $post ) {
	
		$u = parse_url($post['wr_link1']);
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
</div>
</body>
</html>
