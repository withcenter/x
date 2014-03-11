<?php
function setTopMenu( $name ) {
	
	ob_start();
?>
	<input type='text' name='<?=$name?>' value="<?=x::meta( $name )?>" placeholder=" 게시판 아이디 직접 입력" style='height: 23px; width: 140px; line-height: 23px; padding: 0 10px;' />
<?
	return $content = ob_get_clean();
}
?>


 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>탑 메뉴 설정</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_community_2_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
	
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_community_2_1'>	
	</div>
	<table cellpadding=0 cellspacing=0 width='100%' class='forum-config'>
		<tr>
			<td>
				<? for ( $i = 1; $i <=3; $i++ ) {?>
					<div>왼쪽 <?=$i?> : <?=setTopMenu('forum_no_'.$i)?></div>
				<? }?>
			</td>
			<td width=10></td>
			<td>
				<? for ( $i = 4; $i <=6; $i++ ) {?>
					<div>오른쪽 <?=$i-3?> : <?=setTopMenu('forum_no_'.$i)?></div>
				<? }?>
			</td>
		</tr>
	</table>
	
	
	
		
	</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div>

  <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>추가 사이트 정보</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_community_2_2' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_community_2_2'>	
	</div>
		<span class='title-small'>전화번호: </span><input type='text' name='com3contact_num' value='<?=ms::meta('com3contact_num')?>'>	
	</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div>

 <div class='config-wrapper'>

	<div class='config-title'>
		<span class='config-title-info'>사이트 로고 및 배너</span>
		<span class='config-title-notice'>		
			<span class='user-google-guide-button' page = 'google_doc_community_2_3' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
<div class='config-container'>

<div class='hidden-google-doc google_doc_community_3_3'>	
</div>

<table cellspacing='0' cellpadding='5' class='image-config' width='100%'>

	<tr valign='top' >
		<td colspan='3'>
			<div class='image-title'>
				<img src='<?=x::url()?>/module/multisite/img/img-icon.png'>사이트 로고				
			</div>
			<div class='image-upload'>
			<?if( ms::meta('header_logo') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('header_logo').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 325px X 세로 60px]</div>
				<?}?>
				<input type='file' name='header_logo'>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>
		<? /*
		<td width='50%'>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>회사로고</div>
			<div class='image-upload'>
			<?if( ms::meta('com3banner_company') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com3banner_company').">"; 
			} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 210px X 세로 116px]</div>"; ?>
				<input type='file' name='com3banner_company'>
				<?if( ms::meta('com3banner_company') != '' ) { ?>
					<input type='hidden' name='com3banner_company_remove' value='n'>
					<input type='checkbox' name='com3banner_company_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td> */?>
	</tr>
	<tr valign='top'>
		<td>		
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지1</div>
			<div class='image-upload'>
			<?if( ms::meta('com3banner_1') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com3banner_1').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 750px X 세로 240px]</div>
				<?}?>
				<input type='file' name='com3banner_1'>
				<?if( ms::meta('com3banner_1') != '' ) { ?>
					<input type='hidden' name='com3banner_1_remove' value='n'>
					<input type='checkbox' name='com3banner_1_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
				<div class='title'>배너1의 문구</div>
				<textarea name='com3banner_1_text1'><?=stripslashes(ms::meta('com3banner_1_text1'))?></textarea>
				<div class='title'>배너1 링크</div>
				<input type='text' name='com3banner_1_text2' value='<?=ms::meta('com3banner_1_text2')?>'>
			</div>
		</td>
 
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지2</div>
			<div class='image-upload'>
			<?if( ms::meta('com3banner_2') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com3banner_2').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 750px X 세로 240px]</div>
				<?}?>
			<input type='file' name='com3banner_2'>
			<?if( ms::meta('com3banner_2') != '' ) { ?>
				<input type='hidden' name='com3banner_2_remove' value='n'>
				<input type='checkbox' name='com3banner_2_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너2의 문구</div>
			<textarea name='com3banner_2_text1'><?=stripslashes(ms::meta('com3banner_2_text1'))?></textarea>
				<div class='title'>배너2 링크</div>
				<input type='text' name='com3banner_2_text2' value='<?=ms::meta('com3banner_2_text2')?>'>
			</div>
		</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지3</div>
			<div class='image-upload'>
			<?if( ms::meta('com3banner_3') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com3banner_3').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 750px X 세로 240px]</div>
				<?}?>
			<input type='file' name='com3banner_3'>
			<?if( ms::meta('com3banner_3') != '' ) { ?>
				<input type='hidden' name='com3banner_3_remove' value='n'>
				<input type='checkbox' name='com3banner_3_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너3의 문구</div>
			<textarea name='com3banner_3_text1'><?=stripslashes(ms::meta('com3banner_3_text1'))?></textarea>
				<div class='title'>배너3 링크</div>
				<input type='text' name='com3banner_3_text2' value='<?=ms::meta('com3banner_3_text2')?>'>
			</div>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지4</div>
			<div class='image-upload'>
			<?if( ms::meta('com3banner_4') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com3banner_4').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 750px X 세로 240px]</div>
				<?}?>
			<input type='file' name='com3banner_4'>
			<?if( ms::meta('com3banner_4') != '' ) { ?>
				<input type='hidden' name='com3banner_4_remove' value='n'>
				<input type='checkbox' name='com3banner_4_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너4의 문구</div>
			<textarea name='com3banner_4_text1'><?=stripslashes(ms::meta('com3banner_4_text1'))?></textarea>
				<div class='title'>배너4 링크</div>
				<input type='text' name='com3banner_4_text2' value='<?=ms::meta('com3banner_4_text2')?>'>
			</div>
		</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지5</div>
			<div class='image-upload'>
			<?if( ms::meta('com3banner_5') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com3banner_5').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 750px X 세로 240px]</div>
				<?}?>
			<input type='file' name='com3banner_5'>
			<?if( ms::meta('com3banner_5') != '' ) { ?>
				<input type='hidden' name='com3banner_5_remove' value='n'>
				<input type='checkbox' name='com3banner_5_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너5의 문구</div>
			<textarea name='com3banner_5_text1'><?=stripslashes(ms::meta('com3banner_5_text1'))?></textarea>
				<div class='title'>배너5 링크</div>
				<input type='text' name='com3banner_5_text2' value='<?=ms::meta('com3banner_5_text2')?>'>
			</div>
		</td>
	</tr>
</table>
</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div>