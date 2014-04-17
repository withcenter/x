<?php
/**
 *  @file list.php
 *  @see 
 */
?>
<script>
var url = "<?=X_URL?>/x/index.php";
var data = "module=update&action=ajax_main_server_list_info_submit";
ajax_cross_domain_call( {
	type: 'POST',
	url: url,
	data: data,
	callback: 'callback_ajax_load'
} );
function callback_ajax_load( data )
{
	setTimeout( function() {
	$('.count_theme').text( data.count_theme );
		$('.count_widget').text( data.count_widget );
		$('.count_module').text( data.count_module );
	},
	1000);
}
</script>

<?
	include 'dist-menu.php';
?>
<br>
<link rel="stylesheet" href="<?=module("$action.css")?>">

<a href='?module=update&action=list&type=theme'>THEME(<span class='count_theme'><img src='<?=x::url()?>/img/loader3.gif'></span>)</a>,
<a href='?module=update&action=list&type=widget'>WIDGET(<span class='count_widget'><img src='<?=x::url()?>/img/loader3.gif'></span>)</a>,
<a href='?module=update&action=list&type=module'>MODULE(<span class='count_module'><img src='<?=x::url()?>/img/loader3.gif'></span>)</a>

<br>
<?
	return;
	
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
	
	