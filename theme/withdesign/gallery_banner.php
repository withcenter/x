<link rel="stylesheet" href="<?=x::theme_url()?>/css/gallery_banner.css">
<script src="<?=x::theme_url()?>/js/gallery_banner.js"></script>

<div class='gallery_container'>
	<img class='arrow left' src='<?=x::url_theme()?>/img/arrow_left.png' />
	<img class='arrow right' src='<?=x::url_theme()?>/img/arrow_right.png' />
		<div class='inner_wrapper'>
	<div class='gallery_item' banner_num='1'>	
		<div class='inner service'>
			<div class='service_title'>SERVICE 1</div>
			<div class='content'>
			<img class='fake_image' src='<?=x::url_theme()?>/img/fake_image.png'/>
				<div class='item_holder'>
				<?
					for( $i = 1; $i <= 4; $i ++ ){
					if( $i == 1 ) $first_item = "first_item";
					else $first_item = null;
					if( $i == 4 ) $last_item = true;
					else $last_item = null;
				?>
					<div class='item_info <?=$first_item?>'>
						<a href='javascript:void(0)'><img src='<?=x::url_theme()?>/img/item<?=$i?>.png'/></a>
						<div class='label'>ITEM <?=$i?></div>
					</div>
					<?if( !$last_item ) {?>										
						<img class = 'plus_sign' src='<?=x::url_theme()?>/img/plus.png'/>
					<?}?>
				<?
					}
				?>
				</div>							
			<div class='button service'>Button</div>
			</div>			
		</div>
	</div>
	<div class='gallery_item' banner_num='2'>	
		<div class='inner service'>
			<div class='service_title'>SERVICE 2</div>
			<div class='content'>
			<img class='fake_image' src='<?=x::url_theme()?>/img/fake_image.png'/>
				<div class='item_holder'>
				<?
					for( $i = 5; $i <= 6; $i ++ ){
					if( $i == 5 ) $first_item = "first_item";
					else $first_item = null;
					if( $i == 6 ) $last_item = true;
					else $last_item = null;
				?>
					<div class='item_info <?=$first_item?>'>
						<a href='javascript:void(0)'><img src='<?=x::url_theme()?>/img/item<?=$i?>.png'/></a>		
						<div class='label'>ITEM <?=$i?></div>
					</div>
					<?if( !$last_item ) {?>										
						<img class = 'plus_sign' src='<?=x::url_theme()?>/img/plus.png'/>
					<?}?>
				<?
					}
				?>
				</div>								
			<div class='button service'>Button</div>
			</div>			
		</div>
	</div>
	
<?
	$dirs = file::getDirs(X_DIR_THEME);
	$i = 3;
	foreach ( $dirs as $dir ) {
	if( $i > 8 ) break;
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;	
				
	$theme_config = load_config ( $path );
	$theme_name = $theme_config['name'][L];
	if ( empty($theme_name) ) continue;

	$type = explode(',', $theme_config['type']);
				
				
	if ( in_array( 'pc', $type ) ) {
								
		$url = x::url().'/theme/'.$dir.'/preview.jpg';
?>		
			<div class='gallery_item' banner_num = '<?=$i?>'>
				<div class='inner banner_<?=$i?>'>
					<div class='content'>						
						<img class = 'gallery_image' banner_num = '<?=$i?>' src='<?=$url?>'/>
						<div class='info' banner_num='<?=$i?>'>
							<div class='title'><?=$theme_name?></div>
							<div class='description'>
								This is Description This is Description This is Description This is Description This is Description.
							</div>
						</div>
						<div class='button button1' banner_num = '<?=$i?>'>Visit</div>
						<div class='button button2' banner_num = '<?=$i?>'>View Detail</div>
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
	if( $i > 6 + 2) break;
	$path = X_DIR_THEME . "/$dir/config.xml";
	if ( ! file_exists($path) ) continue;
	
	$theme_config = load_config ( $path );
	$theme_name = $theme_config['name'][L];
	if ( empty($theme_name) ) continue;		
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
	.gallery_container .gallery_item[banner_num='1'], .gallery_container .gallery_item[banner_num='2']{
		background:url('<?=x::url_theme()?>/img/bg_service.png');
	}
	
	.gallery_container .gallery_item[banner_num='3']{
		background:url('<?=x::url_theme()?>/img/bg_gallery_1.png');
	}
	.gallery_container .gallery_item[banner_num='4']{
		background:url('<?=x::url_theme()?>/img/bg_gallery_2.png');
	}
	.gallery_container .gallery_item[banner_num='5']{
		background:url('<?=x::url_theme()?>/img/bg_gallery_3.png');
	}
	.gallery_container .gallery_item[banner_num='6']{
		background:url('<?=x::url_theme()?>/img/bg_gallery_4.png');
	}
	.gallery_container .gallery_item[banner_num='7']{
		background:url('<?=x::url_theme()?>/img/bg_gallery_5.png');
	}
	.gallery_container .gallery_item[banner_num='8']{
		background:url('<?=x::url_theme()?>/img/bg_gallery_6.png');
	}
</style>

<?if ( preg_match('/msie 7/i', $_SERVER['HTTP_USER_AGENT'] ) ) {?>
<style>		
	.gallery_container .gallery_item{
		display:inline;
		padding-right:4px;
	}
	
	.gallery_container .command .bullet{		
		display:inline;
		margin:0 2px;
	}
	
	.gallery_container .gallery_item .inner .item_info{			
		display:inline;
	}
</style>
<?}?>