<?php
	$posts = x::posts(
		array(
			'bo_table'			=> $in['type'],
			'select'			=> 'wr_id, wr_subject, wr_content, wr_name, wr_datetime, wr_option, wr_link1',
			'limit'				=> 1000,
		)
	);
	if ( empty($posts) ) {
		echo "$in[callback](" . json_encode( array('code'=>'-1', 'message'=>"No data on $in[type] forum.") ) . ")";
		exit;
	}
	
	

	foreach ( $posts as $p ) {
		$project_url = $p['wr_link1'];
		$u = parse_url($project_url);
		$git_raw_host = "raw.githubusercontent.com";
		$url_preview = "https://$git_raw_host$u[path]/master/preview.jpg";
		$url_config = "https://$git_raw_host$u[path]/master/config.xml";

		//di($url_config); // load_config();
		$config = load_xml( $url_config );
		
		
		if ( empty($config) ) continue;
		$a = explode('/', $project_url);
		$name = $a[ count($a) - 1 ];


		if ( $in['dirs'] ) {
			if ( in_array( $name, $in['dirs'] ) ) $installed = 'yes';
			else $installed = 'no';
		}

		$source_link = urlencode( $project_url );
		
		
		$theme = array();
		$theme['url_preview']		= $url_preview;
		$theme['name']				= $config['name'][L];
		$theme['installed']			= $installed;
		$theme['short']				= $config['short'][L];
		$theme['source_link']		= $source_link;
		$theme['name']			= $name;
		$themes[] = $theme;
	}

	echo "$in[callback](" . json_encode( $themes ) . ")";

