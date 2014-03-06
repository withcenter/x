<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
?>
<form action='?' class='config_theme' method='post'>
	<input type='hidden' name='module' value='multisite'>
	<input type='hidden' name='action' value='config_mobile_theme_submit'>

	<div class='config config-theme'>
		<div class='config-main-title'>
			<div class='inner'>
				<img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 원하시는 테마를 선택하신 후 클릭하시면 반영이 됩니다.
				<a class='user-google-guide-button' href='#googledoc'>[도움말]</a>
			</div>
		</div>
		<div class='config-container'>
		<table cellspacing='0' cellpadding='5'>
			<tr>
				<td>
					
			<?if ( ms::meta('mobile_theme') ) { ?>
				<button type='submit' name='theme' disabled="disabled">
					<div class='theme-thumb'>
						<img src='theme/<?=ms::meta('mobile_theme')?>/preview.jpg' >
						<p><b>선택 되었습니다.</b></p>
						<table cellpadding='10px'><tr><td><?=ms::meta('mobile_theme')?></td></table>
					</div>
				</button>
			<?}?>
			</td>
			<td>
		<?php
			$theme_ctr = 2;
			$dirs = file::getDirs(X_DIR_THEME);
			foreach ( $dirs as $dir ) {
				$path = X_DIR_THEME . "/$dir/config.php";
				if ( ! file_exists($path) ) continue;				
				
				$theme_config = array();
				include $path;
				$name = $theme_config['name'];
				if ( empty($name) ) continue;
				$type = explode(',', $theme_config['type']);
				if ( ! in_array( 'mobile', $type ) ) continue;
				
				$url = x::url().'/theme/'.$dir.'/preview.jpg';
				if( preg_replace('/[^a-zA-Z0-9]/s', '', mb_strtolower(ms::meta('mobile_theme'))) != preg_replace('/[^a-zA-Z0-9]/s', '', mb_strtolower($dir)) ) { ?>
				<button type='submit' name='theme' value='<?=$dir?>' onclick="return confirm('Do you really want to change Theme?');">
						<div class='theme-thumb inactive'>
						<img src='<?=$url?>' >
						<table cellpadding='10px'><tr><td><?=$name?></td></table>
						</div>
					</button>
				<?if($theme_ctr==2) { 
					echo "</td></tr><tr><td>"; $theme_ctr = 1;
				} else { 
					echo "</td><td>"; 
					$theme_ctr++;
				}}
				} ?>
		</table>		
			<div class='google-doc-wrapper'>
				<a name='googledoc'></a>
				<div>필고 사이트 서비스 설명서:</div>
				<iframe src="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep" style='width:100%; height: 400px;'></iframe>	
			</div>
		</div>
	</div> <!--config--theme-->
</form>
