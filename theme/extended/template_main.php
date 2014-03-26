<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/template_main.css' />
<div class='template_main'>
	<div class='template_main_title'><div class='inner'>템플릿 갤러리</div></div>
<?php
$dirs = file::getDirs(X_DIR_THEME);
foreach ( $dirs as $dir ) {
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
	if ( empty($name) ) continue;

	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
								
		$url = x::url().'/theme/'.$dir.'/preview.jpg';
?>
			<div class='template_photo'>
				<img src='<?=$url?>' />
				<div class='template_title'>
					<?=$name?>
					<span class='template_demo'><a href='<?=$theme_config['demo']?>' target='_blank'>데모</a></span>
				</div>
				
			</div>
		
<?}?>	
<?}?>
	<div style='clear: left;'></div>
</div>
