<?php
$dirs = file::getDirs(X_DIR_THEME);
$j = 0;
foreach ( $dirs as $dir ) {
	if ( $j == 3 ) break;
	$path = X_DIR_THEME . "/".$dir."/config.xml";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
				
	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
		$url = x::url().'/theme/'.$dir.'/preview.jpg';
?>
			<div class='lower-middle-<?=$j?>'>
				<a href='<?=g::url()?>/?page=template_main'><img src='<?=$url?>' style='border:0;'/></a>
			</div>
		
	<?
		$j++;
	}?>	
<?}?>