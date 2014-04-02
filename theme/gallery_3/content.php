<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">

<script src='<?=x::url_theme()?>/js/banner.js' /></script>
<?
		$banners = array();
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
				$banners[] = array(
					'src' => x::url_file( "banner$i" ),
					'href' => x::meta( "banner{$i}_url" ),
					'subject' => x::meta("banner{$i}_subject"),
					'content' => x::meta("banner{$i}_content")
				);
			} 
		}
		$total_banners = count($banners);		
	?>	
	
		<div class='banner-container'>
			<div class='banner'>
				<? foreach ( $banners as $banner ) {
					$banner['src'] = g::thumbnail_from_image_tag( "<img src='$banner[src]''>", bo_table(1), 958, 238);
					echo "<img src='$banner[src]'/>";
				}
				?>
				<div style='clear:both'></div>					
			</div>				
		</div>
		
	