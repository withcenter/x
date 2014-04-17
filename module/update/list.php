<?php
/**
 *  @file list.php
 *  @see 
 */
	$var = null;
	$dirs = file::getDirs( x::dir() . "/$type");
	$qs = array();
	foreach ( $dirs as $dir ) {
		$qs[] = "dirs[]=$dir";
	}
	$var = implode('&', $qs);
?>
<script>
var url = "<?=X_URL_REAL?>/x/index.php";
var data = "module=update&action=ajax_main_server_list_info_submit&type=<?=$in['type']?>&<?=$var?>";
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
	$('.loader').slideUp('fast');
	$('.list').html( data.html );
}
</script>

<?
	include 'dist-menu.php';
	if ( admin() ) $pre = 'admin_';
?>

<br>
<link rel="stylesheet" href="<?=module("list.css")?>">

<a href='?module=update&action=<?=$pre?>list&type=theme'>THEME(<span class='count_theme'><img src='<?=x::url()?>/img/loader3.gif'></span>)</a>,
<a href='?module=update&action=<?=$pre?>list&type=widget'>WIDGET(<span class='count_widget'><img src='<?=x::url()?>/img/loader3.gif'></span>)</a>,
<a href='?module=update&action=<?=$pre?>list&type=module'>MODULE(<span class='count_module'><img src='<?=x::url()?>/img/loader3.gif'></span>)</a>

<br>

<?
	if ( empty($type) ) return;
?>
<div class='list'>
	<div class='loader'>
		<img src="<?=x::url()?>/img/loader12.gif">
		<?=ln("Please, wait while $type information is downloaded from github.com",
			"githubm.com 으로 부터 $type 정보를 다운로드 중입니다.")?>
	</div>
</div>
<div style='clear:left;'></div>


<?
	return;
	
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
	
	
