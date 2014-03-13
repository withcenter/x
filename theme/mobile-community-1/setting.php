<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>ADDITIONAL INFORMATION</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	<div class='config-container' cellspacing='0' cellpadding='10' >
	<div class='hidden-google-doc google_doc_travel_1_1'>	
	</div>
		<table>
			<tr>
				<td colspan='2'><span class='title-small'>Contact Number</span><input type='text' name='mobile_contact_num' value='<?=x::meta('mobile_contact_num')?>' /></td>
			<tr>
		</table>
	</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'><span class='config-title-info'>LOGOS</span></span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_2' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_mobile_1_2'>	
	</div>	
	
	<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>
	<tr valign='top' >
		<td width='50%'> 
			<div class='image-title'>
				<img src='<?=module('img/img-icon.png')?>'>사이트 로고				
			</div>
			<div class='image-upload'>
			<?
				if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
				else {
			?>
				<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>
				[가로 209px X 세로 59px]</div>
			<?
				}
			?>
				<input type='file' name='<?=code_logo()?>'>
				<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</td>
	</table>

		
	</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div> 