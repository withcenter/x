<?php
	
?>
<script src='<?=x::url()?>/module/<?=$module?>/subsite.js'></script>
<form action='?' class='config_general' method='POST' enctype='multipart/form-data'>
		<input type='hidden' name='module' value='<?=$module?>'>
		<input type='hidden' name='action' value='config_global_submit'>
<div class='config site-global'>
	
	<div class='config-main-title'>
		<div class='inner'>
			<img src='<?=x::url().'/module/<?=$module?>/img/direction.png'?>'> 통합 사이트 정보
		</div>				
	</div>
	
	<div class='config-main-container'>

		<div class='config-wrapper'>						
			<div class='config-title'>
				<span class='config-title-info'>기본 사이트 설정</span>
				<span class='config-title-notice'><span class='user-google-guide-button' page = 'google_doc_1'>[도움말]</span><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span>
			</div>	
			<div class='config-container'>

			<div class='hidden-google-doc google_doc_1'>	
				<div>필고 사이트 서비스 설명서:</div>
				<iframe src="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep" style='width:99.5%; height: 400px;'></iframe>	
			</div>
				<table cellpadding='0' cellspacing='0' width='100%'>

					<tr valign='top'>
						<td width='120'>
							<span class='config-name'>메인 타이틀</span></td><td><input type='text' name='title' value='<?=ms::meta('title')?>'>
						</td>
					</tr>
					<tr valign='top'>
						<td>
							<span class='config-name'>서브 타이틀</span></td><td><input type='text' name='secondary_title' value='<?=ms::meta('secondary_title')?>'>
						</td>
					</tr>
					<tr valign='top'>
						<td>
							<span class='config-name'>하단 문구</span></td><td><textarea name='footer_text' ><?=stripslashes(ms::meta('footer_text'))?></textarea>
						</td>
					</tr>
					<tr valign='top'>
						<td>
						<span class='config-name'>사이드 바 위치:</span></td><td>				
							<div>
								<input type="radio" name="theme_sidebar" value="left"  <?if(!ms::meta('theme_sidebar') || ms::meta('theme_sidebar') == 'left') echo "checked"?>><span class='radio-left'>왼쪽</span> 
								<input type="radio" name="theme_sidebar" value="right" <?if(ms::meta('theme_sidebar') =='right') echo "checked"?>><span class='radio-right'>오른쪽</span>
							</div>
						</td>
					</tr>
				</table>
			</div>
				<input type='submit' value='업데이트' class='per-config-submit'>
				<div style='clear:right;'></div>
		</div>


		
		<? if ( x::theme() ) { ?>
			<?php
				if ( file_exists( x::theme('setting') ) ) include x::theme('setting');
			?>
		<? } else { ?>
			<h1>테마를 선택하십시오.</h1>
		<? } ?>
		
	</div><!--config-main-container-->
</div>
</form>