<div class='config-wrapper'>
<div class='config-title'>
	<span class='config-title-info'>Additional Information</span>
	<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_1_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
		<img src='<?=module('img/setting_2.png')?>'>
	</span>
	</div>
<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_1_4'>	
</div>
	<table cellspacing='0' cellpadding='0' width='100%'>
		<tr>
			<td colspan='2'><span class='title-small'>Contact Number</span><input type='text' name='gallery4_contact_number' value='<?=x::meta('gallery4_contact_number')?>' /></td>
		<tr>
	</table>
</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
<div class='config-title'>
	<span class='config-title-info'>Menu Icons and Logos</span>
	<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_1_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
		<img src='<?=module('img/setting_2.png')?>'>
	</span>
	</div>
<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_1_4'>	
</div>
	<table cellspacing='0' cellpadding='0' width='100%'>
		<tr>
			<td>
				<div class='image-title'>
					<img src='<?=module('img/img-icon.png')?>'> 사이트 로고				
				</div>
				<div class='image-upload'>
				<?
					if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
					else {
				?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>
					[가로 117 X 세로 40px]</div>
				<?
					}
				?>
					<input type='file' name='<?=code_logo()?>'>
					<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
				</div>
			</td>
			<td>
				<div class='image-title'><img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>Footer Logo</div>
				<div class='image-upload'>
				<?
					if( file_exists( x::path_file( "gallery4_footer_logo" ) ) ) echo "<img src='".x::url_file( "gallery4_footer_logo" )."'>";
					else {
				?>
						<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 125px X 세로 45px]</div>
					<?}?>
					<input type='file' name='gallery4_footer_logo'>
					<input type='checkbox' name='gallery4_footer_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2' style='padding: 20px 0'>
				<table cellspacing='0' cellpadding='0' width='100%'>
					<tr><td colspan='3'><div class='image-title'><img src='<?=module('img/img-icon.png')?>'> MAIN MENU ICONS </div></td></tr>
					<tr class='table-header'><td>Menu Name</td><td>Desktop Layout Icon</td><td>Mobile Layout Icon</td></tr>
					<?
						$menu_links = x::menus();
						foreach ( $menu_links as $menu ) { ?>
							<tr class='menu_icon'>
								<td><?=$menu['url']?></td>
								<td><input type='file' name="<?=$menu['url']?>_desktop"/></td>
								<td><input type='file' name="<?=$menu['url']?>_mobile"/></td>
							</tr>
					<?}?>
				</table>
			</td>
		</tr>
	</table>
</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>
