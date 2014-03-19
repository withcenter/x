<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이트로고 배너</span>
		<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_community_1_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
		</div>	
<div class='config-container'>
<div class='hidden-google-doc google_doc_community_1_1'>	
</div>
<div class='image-config'>

		<div class='image-upload-container'>
			<div class='image-title'>사이트 로고</div>
			<div class='image-upload'>
			<?
				if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
				else {
			?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/site/img/no-image.png'><br>[가로 330px X 세로 50px]</div>
				<?}?>
				<input type='file' name='<?=code_logo()?>'>
				<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</div>

		<div class='image-upload-container'>
			<div class='image-title'>메인 배너</div>
			<div class='image-upload'>
			<?php
			if( file_exists( x::path_file( "banner" ) ) ) echo "<img src='".x::url_file( "banner" )."'>";
			else {?>
				<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/site/img/no-image.png'><br>[가로 760px X 세로 250px]</div>
			<?}?>
			<input type='file' name='banner'>
			<input type='checkbox' name='banner_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</div>

		<div class='image-upload-container last-container'>
			<div class='image-title'>하단 배너</div>
			<div class='image-upload'>
			<?php
				if( file_exists( x::path_file( "banner_bottom" ) ) ) echo "<img src='".x::url_file( "banner_bottom" )."'>";
				else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/site/img/no-image.png'><br>[가로 760px X 세로 130px]</div>
				<?}?>
				<input type='file' name='banner_bottom'>
				<input type='checkbox' name='banner_bottom_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</div>
		<div style='clear: left'></div>
</div><!--image container-->
</div>
		<input type='submit' value='업데이트' class='per-config-submit'>
		<div style='clear:right;'></div>
</div>