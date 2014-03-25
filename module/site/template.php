<link rel="stylesheet" type='text/css' href='<?=x::url()?>/module/site/template.css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src='<?=x::url()?>/module/site/template.js'></script>
<div class='template'>
	<div class='theme-selection'>
	<?php
			$dirs = file::getDirs(X_DIR_THEME);		
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
			<? if ( $dir == $active_theme ) $thumb_class = "active-theme";
				else $thumb_class = "inactive";
			?>
			
			<div class='theme-thumb <?=$thumb_class?> ' theme_value='<?=$dir?>' theme_name ='<?=$theme_config['name']['ko']?>'>
				<div class='inner'>
					<img src='<?=$url?>' >
					<span class='theme-name'><?=$name?></span>
					<span class='view-overlay'><img src="<?=module('img/view.png')?>"/><p>VIEW</p></span>
					<? if ( $dir == $active_theme ) { ?><span class='active-overlay'><img src="<?=module('img/selected.png')?>"/><p>SELECTED</p></span> <? } ?>
				</div>
			</div>
			
		<?}?>
		<div style='clear:both'></div>
</div>			