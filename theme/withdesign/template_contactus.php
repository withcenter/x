<?php
$dirs = file::getDirs(X_DIR_THEME);
	$i = 1;
foreach ( $dirs as $dir ) {
	if ( $i > 9 ) break;
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
	if ( empty($name) ) continue;

	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
								
		$url = x::url().'/theme/'.$dir.'/preview.jpg';

		
?>		<div class='template_contactus'>
			<div class='inner'>
				<img src='<?=$url?>' />
				<div class='template_name' template_name='<?=$name?>'>
					<?=$name?>
					<a href='<?=$theme_config['demo']?>' target='_blank'></a>
				</div>
				<div class='view-template'><img src="<?=x::theme_url('img/view.png')?>"/></div>
				<div class='selected-template'><img src="<?=x::theme_url('img/selected.png')?>"/></div>
			</div>
		</div>
	
<?	$i++;

}?>

<?}?>
<div style='clear: left'></div>

