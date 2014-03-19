<?php
	include x::theme('config');
?>
<!--<script src='<?=x::url()?>/module/<?=$module?>/subsite.js'></script>-->

<form action='?' class='config_general' method='POST' enctype='multipart/form-data'>
		<input type='hidden' name='module' value='<?=$module?>'>
		<input type='hidden' name='action' value='config_global_submit'>
<div class='config site-global'>
	
	<div class='config-main-title'>
		<div class='inner'>
			<img src='<?=module('img/direction.png')?>'> 통합 사이트 정보
		</div>				
	</div>
	
	<div class='config-main-container'>

		<div class='config-wrapper'>						
			<div class='config-title'>
				<span class='config-title-info'>기본 사이트 설정</span>
				<span class='config-title-notice'>
					<span class='user-google-guide-button' page = 'google_doc_global' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
					<img src='<?=module('img/setting_2.png')?>'>
				</span>
			</div>
			
			<div class='config-container'>

			<div class='hidden-google-doc google_doc_global'></div>
			
			
				<table cellpadding='0' cellspacing='0' width='100%'>

					<tr valign='top'>
						<td width='120'>
							<span class='config-name'>메인 타이틀</span></td><td><input type='text' name='title' value='<?=meta('title')?>'>
						</td>
					</tr>
					<tr valign='top'>
						<td>
							<span class='config-name'>서브 타이틀</span></td><td><input type='text' name='secondary_title' value='<?=x::meta('secondary_title')?>'>
						</td>
					</tr>
					<tr valign='top'>
						<td>
							<span class='config-name'>하단 문구</span></td><td><textarea name='footer_text' ><?=stripslashes(x::meta('footer_text'))?></textarea>
						</td>
					</tr>
					<tr valign='top'>
						<td>
						<span class='config-name'>사이드 바 위치:</span></td><td>				
							<div>
								<input type="radio" name="theme_sidebar" value="left"  <?if(!meta('theme_sidebar') || meta('theme_sidebar') == 'left') echo "checked"?>><span class='radio-left'>왼쪽</span> 
								<input type="radio" name="theme_sidebar" value="right" <?if(meta('theme_sidebar') =='right') echo "checked"?>><span class='radio-right'>오른쪽</span>
							</div>
						</td>
					</tr>
				</table>
			</div>
				<input type='submit' value='업데이트' class='per-config-submit'>
				<div style='clear:right;'></div>
		</div>
		
		<?php
		
			include 'config_global_member_skin.php';
		
			$id = 'top'; include 'config_global_menu.php';
			$id = 'left'; include 'config_global_menu.php';
			$id = 'right'; include 'config_global_menu.php';
			$id = 'bottom'; include 'config_global_menu.php';
		?>

		
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