<link rel="stylesheet" type='text/css' href='<?=x::url()?>/module/site/template.css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src='<?=x::url()?>/module/site/template.js'></script>
<div class='template'>
	<?
		$dirs = file::getDirs(X_DIR_THEME);
		foreach ( $dirs as $dir ){
			if ( $dir == $active_theme ) {
				$theme_config = load_config( X_DIR_THEME . "/$dir/config.xml" );
				$active_theme = $theme_config['name']['ko'];
				
				$active_theme_dir = $dir;
				break;
			}
		}
	?>
	<?if ( $active_theme_dir ) { ?>
		<div class='theme-thumb'>
			<img src='theme/<?=$active_theme_dir?>/preview.jpg' >					
			<div class='theme-name active-theme'><?=$active_theme?><span class='active-note'>가 선택 되었습니다</span></div>
		</div>
	<?}?>
	<div class='theme-selection'>
	<?php
		$theme_ctr = 2;
			
			foreach ( $dirs as $dir ) {
				$path = X_DIR_THEME . "/$dir/config.xml";
				if ( ! file_exists($path) ) continue;
				
				$theme_config = load_config($path);
				//include $path;
				$name = $theme_config['name']['ko'];
				if ( empty($name) ) continue;
				
				$type = explode(',', $theme_config['type']);
				
				
				
				if ( ! in_array( 'pc', $type ) ) continue;
				
				
				
				
			$url = x::url().'/theme/'.$dir.'/preview.jpg';
			?>
			<div class='theme-thumb inactive' theme_value='<?=$dir?>' theme_name ='<?=$theme_config['name']['ko']?>'>
				<img src='<?=$url?>' >
				<span class='theme-name'><?=$name?></span>
			</div>
			
		<?}?>
		<div style='clear:both'></div>
</div>			