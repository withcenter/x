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
		<div class='title'><div class='inner'>원하시는 테마를 선택하신 후 클릭하시면 반영이 됩니다.</div></div>
		<div class='thumb-list'>
		<button type='submit' name='theme' disabled>
			<div class='theme-thumb'>
				<img src='theme/<?=$extra['theme']?>/preview.jpg' >
				<p>이 반영 됨</p>
				<table cellpadding='10px'><tr><td><?=$extra['theme']?></td></table>
			</div>
		</button>
		<?php
			$theme_ctr=0;
			$theme_list = array();
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
				if($extra['theme']!=mb_strtolower($name)) {
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
