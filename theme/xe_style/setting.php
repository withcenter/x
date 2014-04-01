
<div class='config-wrapper'>

	<div class='config-title'>
		<span class='config-title-info'>사이트 로고 및 배너</span>
		<span class='config-title-notice'>		
			<span class='user-google-guide-button' page = 'google_doc_community_2_3' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
<div class='config-container'>

<div class='hidden-google-doc google_doc_community_3_3'>	
</div>

<table cellspacing='0' cellpadding='5' class='image-config' width='100%'>

	<tr valign='top' >
		<td>
			<div class='image-title'>
				<img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>사이트 로고				
			</div>
			<div class='image-upload'>
			<?
				if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
				else {
			?>
				<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>
				[가로 325px X 세로 60px]</div>
			<?
				}
			?>
				<input type='file' name='<?=code_logo()?>'><br />
				<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</td>
		
		<td>		
				<div class='image-title'><img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>메인상단배너 이미지</div>
				<div class='image-upload'>
				<?
					if( file_exists( x::path_file( "main-top-banner" ) ) ) echo "<img src='".x::url_file( "main-top-banner" )."'>";
					else {
				?>
						<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 603px X 세로 100px]</div>
					<?}?>
					<input type='file' name='main-top-banner'> <br />
					<input type='checkbox' name='main-top-banner_remove' value='y'><span class='title-small'>이미지 제거</span><br /><br />
					<div class='title'>메인상단배너 링크</div>
					<input type='text' name='main-top-banner_url' value='<?=x::meta("main-top-banner_url")?>'>
				</div>
			</td>
		</tr>
		
</table>
</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div>