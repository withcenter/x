<?

?>
<form action='?' class='config config_theme' method='post'>
	<input type='hidden' name='module' value='<?=$module?>'>
	<input type='hidden' name='action' value='config_mobile_theme_submit'>
	<input type="hidden" name="theme" id="theme_value" value="" />
<div>
		<div class='config-main-title'>
			<div class='inner'>
				<span class='config-title-info'><img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 원하시는 테마를 선택하신 후 클릭하시면 반영이 됩니다.</span>
				<span class='config-title-notice'><span class='user-google-guide-button inner-title' page = 'google_doc_1'>[도움말]</span></span>
			</div>
		</div>
		<div class='hidden-google-doc google_doc_1'>	
			<div>필고 사이트 서비스 설명서:</div>
			<iframe src="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep" style='width:99.5%; height: 400px;'></iframe>	
		</div>
		<div class='theme_config'>				
			<?			
			if ( ms::meta('mobile_theme') ) { 
			?>	
					<div class='theme-thumb'>
						<img src='theme/<?=ms::meta('mobile_theme')?>/preview.jpg'/>						
						<div class='theme-name active-theme'><?=ms::meta('mobile_theme')?><span class='active-note'>선택 되었습니다</span></div>						
					</div>
			<?
			}
						
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
						<div class='theme-thumb inactive' theme_value='<?=$dir?>'>
						<img src='<?=$url?>' >
						<span class='theme-name'><?=$name?></span>
						</div>					
				<?
					}
				}
				?>
			<div style='clear:both'></div>
		</div>				
	</div> <!--config--theme-->
</form>
	