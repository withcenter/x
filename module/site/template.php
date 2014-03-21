<link rel="stylesheet" type='text/css' href='<?=x::url()?>/module/site/template.css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src='<?=x::url()?>/module/site/template.js'></script>
<div class='template'>
	<?
		$dirs = file::getDirs(X_DIR_THEME);
		foreach ( $dirs as $dir ){
			if ( $dir == $active_theme ) {
				$theme_config = array();
				include X_DIR_THEME . "/$dir/config.php";
				$active_theme_name = $theme_config['name'];
				break;
			}
		}
	?>
	<?if ( $active_theme_name ) { ?>
		<div class='theme-thumb'>
			<img src='theme/<?=$active_theme?>/preview.jpg' >					
			<div class='theme-name active-theme'><?=$active_theme_name?><span class='active-note'>가 선택 되었습니다</span></div>
		</div>
	<?}?>
	<div class='theme-selection'>
		<?php
			$theme_ctr = 2;
				
				foreach ( $dirs as $dir ) {
					$path = X_DIR_THEME . "/$dir/config.php";
					if ( ! file_exists($path) ) continue;
					
					$theme_config = array();
					include $path;
					$name = $theme_config['name'];
					if ( empty($name) ) continue;
					
					$type = explode(',', $theme_config['type']);
					
					
					
					if ( ! in_array( 'pc', $type ) ) continue;
					
					
					
					
				$url = x::url().'/theme/'.$dir.'/preview.jpg';
				?>
				<div class='theme-thumb inactive' theme_value='<?=$dir?>' theme_name ='<?=$theme_config['name']?>'>
					<img src='<?=$url?>' >
					<span class='theme-name'><?=$name?></span>
				</div>
				
			<?}?>
			<div style='clear:both'></div>
	</div>
</div>			