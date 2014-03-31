<?php
	$posts = x::posts(
		array(
			'bo_table'			=> 'theme',
			'select'			=> 'wr_id, wr_subject, wr_content, wr_name, wr_datetime, wr_option, wr_link1',
			'limit'				=> 1000,
		)
	);
	
	foreach ( $posts as $p ) {
		$project_url = $p['wr_link1'];
		$u = parse_url($project_url);
		$git_raw_host = "raw.githubusercontent.com";
		$url_preview = "https://$git_raw_host$u[path]/master/preview.jpg";
		$url_config = "https://$git_raw_host$u[path]/master/config.xml";

		
		
		//di($url_config); // load_config();
		$theme_config = load_xml( $url_config );
		
		
		if ( empty($theme_config) ) continue;
		$a = explode('/', $project_url);
		$pname = $a[ count($a) - 1 ];


		if ( in_array( $pname, $in['dirs'] ) ) $installed = 'yes';
		else $installed = 'no';

		$source_link = urlencode( $project_url );
		
		
		$theme = array();
		$theme['url_preview']		= $url_preview;
		$theme['name']				= $theme_config['name'][L];
		$theme['installed']			= $installed;
		$theme['short']				= $theme_config['short'][L];
		$theme['source_link']		= $source_link;
		$theme['pname']			= $pname;
		$themes[] = $theme;
	}
	
	echo json_encode( $themes );
	