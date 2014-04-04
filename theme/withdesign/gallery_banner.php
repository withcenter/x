<link rel="stylesheet" href="<?=x::theme_url()?>/css/gallery_banner.css">
<script src="<?=x::theme_url()?>/js/gallery_banner.js"></script>

<div class='gallery_container'>
	<img class='arrow left' src='<?=x::url_theme()?>/img/arrow_left.png' />
	<img class='arrow right' src='<?=x::url_theme()?>/img/arrow_right.png' />
		<div class='inner_wrapper'>
<?
	$dirs = file::getDirs(X_DIR_THEME);
	$i = 1;
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
			<div class='gallery_item' banner_num = '<?=$i?>'>
				<div class='inner banner_<?=$i?>'>
					<div class='content'>
						<?/*<img src='<?=x::url_theme()?>/img/Everything-about-the-Eifel-Tower-2.jpg'/>*/?>
						<img src='<?=$url?>'/>
						<div class='info'>
							<div class='title'><?=$name?></div>
							<div class='description'>
								This is Description This is Description This is Description This is Description This is Description.
							</div>
						</div>
						<div class='button button1'>Button 1</div>
						<div class='button button2'>Button 2</div>
					</div>
				</div>
			</div>
<?$i++;

}
}?>				
</div>
	<div class='command'>
	<?
	$i = 1;
	foreach ( $dirs as $dir ) {
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	
	$theme_config = load_config ( $path );
	$name = $theme_config['name'][L];
	if ( empty($name) ) continue;		
	$type = explode(',', $theme_config['type']);
	
	if ( in_array( 'pc', $type ) ) {
	?>
		<div class='bullet' banner_num = '<?=$i?>'>
			<img status = 'off' src='<?=x::url_theme()?>/img/bullet_off.png'/>
			<img status = 'on' src='<?=x::url_theme()?>/img/bullet_on.png'/>
		</div>		
	<?
	
		$i++;
		}
	}?>
	</div>
</div>
<style>
	.gallery_container{
		background:url('<?=x::url_theme()?>/img/gallery_bg.png');
	}
</style>