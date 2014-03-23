
<div class='template_main'>
<?php
$dirs = file::getDirs(X_DIR_THEME);
foreach ( $dirs as $dir ) {
	$path = X_DIR_THEME . "/$dir/config.php";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = array();
	include $path;
	$name = $theme_config['name'];
	if ( empty($name) ) continue;
				
	$type = explode(',', $theme_config['type']);
				
				
				
	if ( ! in_array( 'pc', $type ) ) continue;
				
				
								
	$url = x::url().'/theme/'.$dir.'/preview.jpg';
?>
	<div class='template_photo'>
		<img src='<?=$url?>' />
	</div>
<?}?>
</div>
