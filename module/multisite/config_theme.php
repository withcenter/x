<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
?>
<form action='?' class='config_theme' method='post'>
	<input type='hidden' name='module' value='multisite'>
	<input type='hidden' name='action' value='config_theme_submit'>
	<input type="hidden" name="theme" id="theme_value" value="" />

	<div class='config config-theme'>
		<div class='config-main-title'><div class='inner'><img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 원하시는 테마를 선택하신 후 클릭하시면 반영이 됩니다.</div></div>
		<div class='config-container'>
		<table cellspacing='0' cellpadding='5'>
			<tr>
				<td>
				<?
				$active_theme = ms::meta('theme');
				$dirs = file::getDirs(X_DIR_THEME);
				foreach ( $dirs as $dir ){
					if ( $dir == $active_theme ) {
						$theme_config = array();
						include X_DIR_THEME . "/$dir/config.php";
						$active_theme = $theme_config['name'];
						break;
					}
				}
				?>
			<?if ( $active_theme ) { ?>
				<div class='theme-thumb'>
					<img src='theme/<?=ms::meta('theme')?>/preview.jpg' >
					<p><b>선택 되었습니다.</b></p>
					<table cellpadding='10px'><tr><td><?=$active_theme?></td></table>
				</div>
			<?}?>
			</td>
			<td>
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
				if ( ! in_array( 'subsite', $type ) ) continue;
				
				
				$url = x::url().'/theme/'.$dir.'/preview.jpg';
				if( preg_replace('/[^a-zA-Z0-9]/s', '', mb_strtolower(ms::meta('theme'))) != preg_replace('/[^a-zA-Z0-9]/s', '', mb_strtolower($dir)) ) { ?>
					<div class='theme-thumb inactive' theme_value='<?=$dir?>'>
					<img src='<?=$url?>' >
					<table cellpadding='10px'><tr><td><?=$name?></td></table>
					</div>
				<?if($theme_ctr==2) { 
					echo "</td></tr><tr><td>"; $theme_ctr = 1;
				} else { 
					echo "</td><td>"; 
					$theme_ctr++;
				}}
				} ?>
		</table>
		</div>
	</div> <!--config--theme-->
</form>
