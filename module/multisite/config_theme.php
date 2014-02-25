<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
?>
<form action='?' class='config_theme' method='post'>
	<input type='hidden' name='module' value='multisite'>
	<input type='hidden' name='action' value='config_theme_submit'>

	<div class='config config-theme'>
		<div class='title'><div class='inner'>원하시는 테마를 선택하신 후 클릭하시면 반영이 됩니다.</div></div>
		<table>
			<tr>
				<td>
					
			<?if ( ms::meta('theme') ) { ?>
				<button type='submit' name='theme' disabled="disabled">
					<div class='theme-thumb'>
						<img src='theme/<?=ms::meta('theme')?>/preview.jpg' >
						<p><b>선택 되었습니다.</b></p>
						<table cellpadding='10px'><tr><td><?=ms::meta('theme')?></td></table>
					</div>
				</button>
			<?}?>
			</td>
		<?php
			$theme_ctr = 1;
			$dirs = file::getDirs(X_DIR_THEME);
			foreach ( $dirs as $dir ) {
				$path = X_DIR_THEME . "/$dir/config.php";
				if ( ! file_exists($path) ) continue;				
				
				$theme_config = array();
				include $path;
				$name = $theme_config['name'];
				if ( empty($name) ) continue;
				if ( $theme_config['type'] != 'subsite' ) continue;
				
				$url = x::url().'/theme/'.$dir.'/preview.jpg';
				if( preg_replace('/[^a-zA-Z0-9]/s', '', mb_strtolower(ms::meta('theme'))) != preg_replace('/[^a-zA-Z0-9]/s', '', mb_strtolower($dir)) ) { ?>
				<?if($theme_ctr==2) { echo "</td></tr><tr><td>"; $theme_ctr = 1;
				} else { echo "</td><td>"; }?>
				<button type='submit' name='theme' value='<?=$dir?>' onclick="return confirm('Do you really want to change Theme?');">
						<div class='theme-thumb inactive'>
						<img src='<?=$url?>' >
						<table cellpadding='10px'><tr><td><?=$name?></td></table>
						</div>
					</button></td>
					<? }
				$theme_ctr++;
			} ?>
	
		</table>
	</div> <!--config--theme-->
</form>
