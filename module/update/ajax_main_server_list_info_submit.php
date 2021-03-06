<?php
	include 'class.update.php';

	$data['count_theme'] = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'theme',
			up::project_url	=> array("<> ''"),
		)
	);
	
	$data['count_widget'] = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'widget',
			up::project_url	=> array("<> ''"),
		)
	);
	
	$data['count_module'] = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'module',
			up::project_url	=> array("<> ''"),
		)
	);
	
	
	
	if ( $in['type'] ) {
		$rows = x::data_gets(
			array(
				'first'			=> 'source',
				'second'		=> $in['type'],
				'limit'			=> '1000',
			)
		);
		
		

		foreach ( $rows as $row ) {
			$project_url = $row[ up::project_url ];
			
			if ( empty( $project_url ) ) continue;
			
			$u = parse_url($project_url);
			$git_raw_host = "raw.githubusercontent.com";
			$url_preview = "https://$git_raw_host$u[path]/master/preview.jpg";
			
			
			$a = explode('/', $project_url);
			$folder = $a[ count($a) - 1 ];

			$name = string::unscalar( $row[ up::name ] );
			$short = string::unscalar( $row[ up::short ] );

			if ( $in['dirs'] ) {
				if ( in_array( $folder, $in['dirs'] ) ) $installed = 'yes';
				else $installed = 'no';
			}
			
			$item = array();
			$item['installed']		= $installed;
			$item['url_preview']		= $url_preview;
			$item['name']				= $name[L];
			$item['short']				= $short[L];
			$item['project_url']		= urlencode( $project_url );
			$item['folder']				= $folder;
			$item['version']			= $row[ up::version ];
			$items[] = $item;
		}
		if ( $items ) {
			foreach ( $items as $item ) {
				if ( $item['installed'] == 'yes' ) {
					$ins = ln("UN-INSTALL", "삭제하기");
					$url = "?module=update&action=admin_uninstall&type=$in[type]&name=$item[folder]";
				}
				else {
					$ins = ln("INSTALL", "설치하기");
					$url = "?module=update&action=admin_install&type=$in[type]&source_link=$item[project_url]";
				}
				$install = "<a href='$url'><b>$ins</b></a>";
				$html .= "
					<div class='item'><div class='inner'>
						<div class='preview'><img src='$item[url_preview]'></div>
						<div class='install'>$install</div>
						<div class='name'>$item[name]  $item[version]</div>
						<div class='short'>$item[short]</div>
					</div></div>
				";
			}
			$data['html'] = $html;
		}
	}
	echo "$in[callback](" . json_encode( $data ) . ")";

