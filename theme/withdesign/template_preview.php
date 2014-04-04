
<div class='title'><div class='inner'>Portfolio</div></div>
<?php
$dirs = file::getDirs(X_DIR_THEME);
	$i = 1;
foreach ( $dirs as $dir ) {
	if ( $i > 8 ) break;
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
	if ( empty($name) ) continue;

	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
								
		$url = x::url().'/theme/'.$dir.'/preview.jpg';

		
?>		<div class='template'>
			<div class='inner'>
				<a href='<?=$theme_config['demo']?>' target='_blank'><img src='<?=$url?>' /></a>

				<div class='template_name'>
					Template Design: <?=$name?>
					<a href='<?=$theme_config['demo']?>' target='_blank' class='template_demo'></a>
					<div class='view-details'>VIEW DETAILS</div>
				</div>
				
			</div>
		</div>
	
<?	$i++;

}?>

<?}?>
	<div class='template'>
		<div class='inner view-all'>
			<a href="javascript: void(0)">VIEW ALL</a>
		</div>
	</div>
<div style='clear: left'></div>

