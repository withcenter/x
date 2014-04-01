<div class='title'>템플릿 갤러리<span class='more-button'><a href="?page=template_main">자세히 <img src="<?=x::theme_url('img/more-button.png')?>"/></a></div>
	<table cellspacing='0' cellpadding='0' width='100%' class='template_table'>
		<tr valign='top'>
<?php
$dirs = file::getDirs(X_DIR_THEME);
	$i = 0;
foreach ( $dirs as $dir ) {
	if ( $i > 5 ) break;
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
				
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
	if ( empty($name) ) continue;

	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
								
		$url = x::url().'/theme/'.$dir.'/preview.jpg';
?>		<td>
			<div class='template_photo'>
				<img src='<?=$url?>' />
				
				<div class='template_info'>
					<div class='template_name'><?=$name?></div>
					<img src="<?=x::theme_url('img/preview_theme_template.png')?>" class='preview-template'/>
					<a href='<?=$theme_config['demo']?>' target='_blank'></a>
				</div>
				
			</div>
		</td>
	<?	if ( $i++ % 3 == 2) echo "</tr><tr valign='top'>";
		else echo "<td width='8'></td>";
		?>
<?}?>	


<?}?>
	</table>
