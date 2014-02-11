<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	$dirs = file::getDirs(X_DIR_THEME);
?>
<form action='?' class='config_theme' method='post'>
	<input type='hidden' name='module' value='multisite'>
	<input type='hidden' name='action' value='config_theme_submit'>

	<div class='config config-theme'>
		<h1>Themes, click on the small thumbnails to change</h1>
		<? if ( $extra['theme'] != '' ) { ?>
		<div class='theme-thumb'>
			<img src="theme/<?=$extra['theme']?>/preview.jpg" width='720' height='480'>
			<table cellpadding='10px'><tr><td align='center'>Active Theme: <?=$extra['theme']?></td></table>
		</div>
		<?php
		}
			$theme_ctr=0;
			$theme_list = array();
			echo "<div class='thumb-list'>";
			foreach ( $dirs as $dir ) {
				$path = X_DIR_THEME . "/$dir/config.php";
				if ( ! file_exists($path) ) continue;				
				$theme_config = array();
				include $path;
				if ( empty($theme_config['name']) ) continue;
				
				if ( $theme_config['type'] != 'subsite' ) continue;

				$folder_name = $theme_list['name'][$theme_ctr] = $dir;
				$name = $theme_config['name'];
				$url = $theme_list['url'][$theme_ctr] = 'theme/'.$dir.'/preview.jpg';
				if($extra['theme']!=$name) {
				?>
				<button type='submit' name='theme' value='<?=$folder_name?>' onclick="return confirm('Do you really want to change Theme?');">
					<div class='theme-thumb inactive'>
					<img src='<?=$url?>' >
					<table cellpadding='10px'><tr><td><?=$name?></td></table>
					</div>
				</button>
				<?
				}
				$theme_ctr++;
			}
			?>
			</div>
	</div>

</form>
