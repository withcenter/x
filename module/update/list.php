<?php
	include 'class.update.php';
	include 'dist-menu.php';
	
	
	
	
	$count_theme = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'theme'
		)
	);
	
	$count_widget = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'widget'
		)
	);
	
	$count_module = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'module'
		)
	);
	
?>
<br>
<link rel="stylesheet" href="<?=module("$action.css")?>">

<a href='?module=update&action=list&type=theme'>THEME(<?=$count_theme?>)</a>,
<a href='?module=update&action=list&type=widget'>WIDGET(<?=$count_widget?>)</a>,
<a href='?module=update&action=list&type=module'>MODULE(<?=$count_module?>)</a>

<br>
<?
	if ( empty($type) ) return;
	
	$rows = x::data_gets(
		array(
			'first'			=> 'source',
			'second'		=> $type,
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
		
		$item = array();
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
			echo "
				<div class='item'>
					<div><img src='$item[url_preview]'></div>
					<div>$item[name]  $item[version]</div>
					<div>$item[short]</div>
				</div>
			";
		}
	}
	
	