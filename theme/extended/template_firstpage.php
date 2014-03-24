<?php
$dirs = file::getDirs(X_DIR_THEME);

for ( $i=1; $i <= 3; $i ++ ) {
	$path = X_DIR_THEME . "/".$dirs[$i]."/config.xml";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
				
	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
								
		$url = x::url().'/theme/'.$dirs[$i].'/preview.jpg';
?>
			<div class='lower-middle-<?=$i?>'>
				<a href='<?=g::url()?>/?page=template_main'><img src='<?=$url?>' style='border:0;'/></a>
			</div>
		
	<?}?>	
<?}?>