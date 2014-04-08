<div class='template-wrapper'>
	<div class='template-main'>
		<div class='title'><div class='inner'>Portfolio</div></div>
	<?php
	$dirs = file::getDirs(X_DIR_THEME);
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
					<img src='<?=$url?>' />
					<div class='template_name'>
						Template Design: <?=$name?>
						<a href='<?=$theme_config['demo']?>' target='_blank'></a>
						<div class='view-details'>VIEW DETAILS</div>
					</div>
					
				</div>
			</div>
		
	<?}?>

	<?}?>
	<div style='clear: left'></div>
	</div>
	
	<div class='popup-preview'>
		<div class='inner'>
			<div class='popup-image-wrapper'><div class='image-wrapper'><img src='javascript:void(0)' class='popup-image'/></div></div>
			<div class='popup-details'>
				<div class='inner-details'>
					<span class='popup-title'></span>
					<span class='popup-info'>
						Short information about the design.
						Aliquam facilisis enim nec sem faucibus,
						ac sodales sapien porttitor. Mauris ac orci vitae 
						tellus rhoncus sodales a at metus. Praesent iaculis 
						turpis non turpis tempor, vitae male suada sem tincidunt.
						<br><br>
						Features: blog-style, sidebar, and sign in box
					</span>
					<div class='popup-buttons'>
						<div class='popup-demo'><a href='javascript:void(0)' class='popup-demo-link' target="_blank">VIEW DEMO</a></div>
						<div class='popup-close'><span>CLOSE</span></div>
						<div style='clear: left'></div>
					</div>
				</div>
			</div>
			<div style='clear: left'></div>
		</div>
	</div>
</div>

