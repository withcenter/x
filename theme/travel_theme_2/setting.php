<?php
function setTopMenu( $name ) {
	global $cfgs;
	
	ob_start();
	if ( ms::exist() ) {
		$cfgs = ms::forums();
		if ( ! empty( $cfgs ) ) {
	?>	
	<select name='<?=$name?>'>
		<option value=''>게시판을 선택하세요</option>
		<option value=''></option>
		<? foreach ( $cfgs as $c ) { 
			if ( $c['bo_table'] == ms::meta($name) ) $selected = 'selected';
			else $selected = null;
		?>
			<option value="<?=$c['bo_table']?>" <?=$selected?>><?=$c['bo_subject']?></option>
		<? } ?>
	</select>
	<script>
	$(function(){
		$("[name='<?=$name?>']").change(function(){
			$("[name='<?=$name?>_bo_table']").val($(this).val());
		});
	});
	</script>
	<?
		}
	}?>
	<input type='text' name='<?=$name?>_bo_table' value="" placeholder=" 게시판 아이디 직접 입력"/>
<?
	return $content = ob_get_clean();
}
?>

	<div class='config-wrapper'>
		<div class='config-title'>
			<span class='config-title-info'>탑 메뉴 설정</span>			
			<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_2_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
		<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_2_1'>	
</div>
			<table cellpadding=0 cellspacing=0 width='100%'>
				<tr valign='top'>
					<td>
						<? for ( $i = 1; $i <=2; $i++ ) {?>
							<div class='menu-item-list'>상단1-<?=$i?> : <?=setTopMenu('forum_no_'.$i)?></div>
						<? }?>
					</td>
					<td width=10></td>
					<td>
						<? for ( $i = 3; $i <=6; $i++ ) {?>
							<div class ='menu-item-list'>상단2-<?=$i-3?> : <?=setTopMenu('forum_no_'.$i)?></div>
						<? }?>
					</td>
				</tr>
			</table>	
		</div>
	</div>
  <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이트 추가 설정</span>		
		<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_2_2' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
	<div class='config-container' cellspacing='0' cellpadding='5' >
	<div class='hidden-google-doc google_doc_travel_2_2'>	
	</div>
		<table>
			<tr>
				<td colspan='2'><span class='title-small'>하단문구제목</span><input type='text' name='travel2footer_tagline' value='<?=ms::meta('travel2footer_tagline')?>' /></td>
			<tr>
		</table>		
	</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이트 상하단 로고 & 로고 문구</span>		
		<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_2_3' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_2_3'>	
</div>
<table cellspacing='0' cellpadding='5' class='image-config' width='100%'>
	<tr valign='top' >
		<td width='50%'> 
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>사이트 상단 로고</div>
			<div class='image-upload'>
			<?if( ms::meta('header_logo') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('header_logo').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 310px X 세로 60px]</div>
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
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>COMPANY BANNER (Sidebar)</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_company') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_company').">"; 
			} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 230px X 세로 130px]</div>"; ?>
				<input type='file' name='travel2banner_company'>
				<?if( ms::meta('travel2banner_company') != '' ) { ?>
					<input type='hidden' name='travel2banner_company_remove' value='n'>
					<input type='checkbox' name='travel2banner_company_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td> */?>
		<td width='50%'>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>사이트 하단 로고</div>
			<div class='image-upload'>
			<?if( ms::meta('footer_logo') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('footer_logo').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 100px X 세로 90px]</div>
				<?}?>
				<input type='file' name='footer_logo'>
				<?if( ms::meta('footer_logo') != '' ) { ?>
					<input type='hidden' name='footer_logo_remove' value='n'>
					<input type='checkbox' name='footer_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>
	</tr>
</table>		
</div>
<input type='submit' value='업데이트'>
<div style='clear:right;'></div>
</div>
 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>메인 롤링 배너</span>		
		<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_2_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_2_4'>	
	</div>
	<table cellspacing='0' cellpadding='5' class='image-config' width='100%'>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지1</div>
			<div class='image-upload'>
				<?if( ms::meta('travel2banner_1') ) {
					echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_1').">"; 
				} else {?>
						<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 748px X 세로 238px]</div>
					<?}?>
				<input type='file' name='travel2banner_1'>
				<?if( ms::meta('travel2banner_1') != '' ) { ?>
					<input type='hidden' name='travel2banner_1_remove' value='n'>
					<input type='checkbox' name='travel2banner_1_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
				<div class='title'>배너1의 문구</div>
				<textarea name='travel2banner_1_text1'><?=stripslashes(ms::meta('travel2banner_1_text1'))?></textarea>
				<div class='title'>배너1 링크</div>
				<input type='text' name='travel2banner_1_text2' value='<?=ms::meta('travel2banner_1_text2')?>'>
			</div>
		</td>
 
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지2</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_2') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_2').">"; 
				} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 748px X 세로 238px]</div>
				<?}?>
			<input type='file' name='travel2banner_2'>
			<?if( ms::meta('travel2banner_2') != '' ) { ?>
				<input type='hidden' name='travel2banner_2_remove' value='n'>
				<input type='checkbox' name='travel2banner_2_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너2의 문구</div>
			<textarea name='travel2banner_2_text1'><?=stripslashes(ms::meta('travel2banner_2_text1'))?></textarea>
				<div class='title'>배너2 링크</div>
				<input type='text' name='travel2banner_2_text2' value='<?=ms::meta('travel2banner_2_text2')?>'>
			</div>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지3</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_3') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_3').">"; 
				} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 748px X 세로 238px]</div>
				<?}?>
			<input type='file' name='travel2banner_3'>
			<?if( ms::meta('travel2banner_3') != '' ) { ?>
				<input type='hidden' name='travel2banner_3_remove' value='n'>
				<input type='checkbox' name='travel2banner_3_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너3의 문구</div>
			<textarea name='travel2banner_3_text1'><?=stripslashes(ms::meta('travel2banner_3_text1'))?></textarea>
				<div class='title'>배너3 링크</div>
				<input type='text' name='travel2banner_3_text2' value='<?=ms::meta('travel2banner_3_text2')?>'>
			</div>
		</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지4</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_4') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_4').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 748px X 세로 238px]</div>
				<?}?>
			<input type='file' name='travel2banner_4'>
			<?if( ms::meta('travel2banner_4') != '' ) { ?>
				<input type='hidden' name='travel2banner_4_remove' value='n'>
				<input type='checkbox' name='travel2banner_4_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너4의 문구</div>
			<textarea name='travel2banner_4_text1'><?=stripslashes(ms::meta('travel2banner_4_text1'))?></textarea>
				<div class='title'>배너4 링크</div>
				<input type='text' name='travel2banner_4_text2' value='<?=ms::meta('travel2banner_4_text2')?>'>
			</div>
		</td>
	</tr>
		<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지5</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_5') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_5').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 748px X 세로 238px]</div>
				<?}?>
			<input type='file' name='travel2banner_5'>
			<?if( ms::meta('travel2banner_5') != '' ) { ?>
				<input type='hidden' name='travel2banner_5_remove' value='n'>
				<input type='checkbox' name='travel2banner_5_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너5의 문구</div>
			<textarea name='travel2banner_5_text1'><?=stripslashes(ms::meta('travel2banner_5_text1'))?></textarea>
				<div class='title'>배너5 링크</div>
				<input type='text' name='travel2banner_5_text2' value='<?=ms::meta('travel2banner_5_text2')?>'>
			</div>
		</td>
	</tr>
</table>
</div>
<input type='submit' value='업데이트'>
<div style='clear:right;'></div>
</div>
 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>오른쪽 날개 배너</span>		
		<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_2_5' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_2_5'>	
	</div>
	<table cellspacing='0' cellpadding='5' class='image-config' width='100%'>	
		<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 날개 배너1</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner1_floating') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner1_floating').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 70px X 세로 70px]</div>
				<?}?>
			<input type='file' name='travel2banner1_floating'>
			<?if( ms::meta('travel2banner1_floating') != '' ) { ?>
				<input type='hidden' name='travel2banner1_floating_remove' value='n'>
				<input type='checkbox' name='travel2banner1_floating_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 날개 배너1 URL</div>
			<input type='text' name='travel2banner1_floating_text1' value='<?=ms::meta('travel2banner1_floating_text1')?>'>
			</div>
		</td>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 날개 배너2</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner2_floating') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner2_floating').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 70px X 세로 70px]</div>
				<?}?>
			<input type='file' name='travel2banner2_floating'>
			<?if( ms::meta('travel2banner2_floating') != '' ) { ?>
				<input type='hidden' name='travel2banner2_floating_remove' value='n'>
				<input type='checkbox' name='travel2banner2_floating_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 날개 배너2 URL</div>
			<input type='text' name='travel2banner2_floating_text1' value='<?=ms::meta('travel2banner2_floating_text1')?>'>
			</div>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 날개 배너3</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner3_floating') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner3_floating').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 70px X 세로 70px]</div>
				<?}?>
			<input type='file' name='travel2banner3_floating'>
			<?if( ms::meta('travel2banner3_floating') != '' ) { ?>
				<input type='hidden' name='travel2banner3_floating_remove' value='n'>
				<input type='checkbox' name='travel2banner3_floating_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 날개 배너3 URL</div>
			<input type='text' name='travel2banner3_floating_text1' value='<?=ms::meta('travel2banner3_floating_text1')?>'>
			</div>
		</td>
	</tr>
</table>
	</div><!--/config-container-->
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div><!--config-wrapper-->

 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>중앙 사이드 배너, 하단 배너</span>		
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_2_6' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_2_6'>	
	</div>
	<table cellspacing='0' cellpadding='5' class='image-config' width='100%'>	
		<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>왼쪽 사이드 배너</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner1_sidebar') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner1_sidebar').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 208px X 세로 88px]</div>
				<?}?>
			<input type='file' name='travel2banner1_sidebar'>
			<?if( ms::meta('travel2banner1_sidebar') != '' ) { ?>
				<input type='hidden' name='travel2banner1_sidebar_remove' value='n'>
				<input type='checkbox' name='travel2banner1_sidebar_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>왼쪽 사이드 배너 URL</div>
			<input type='text' name='travel2banner1_sidebar_text1' value='<?=ms::meta('travel2banner1_sidebar_text1')?>'>
		</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 사이드 배너</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_right') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_right').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 208px X 세로 88px]</div>
				<?}?>
			<input type='file' name='travel2banner_right'>
			<?if( ms::meta('travel2banner_right') != '' ) { ?>
				<input type='hidden' name='travel2banner_right_remove' value='n'>
				<input type='checkbox' name='travel2banner_right_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 사이드 배너 URL</div>
			<input type='text' name='travel2banner_right_text1' value='<?=ms::meta('travel2banner_right_text1')?>'>
		</td>

	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>하단 배너</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_bottom') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_bottom').">"; 
			} else {?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/multisite/img/no-image.png'><br>[가로 968px X 세로 168px]</div>
				<?}?>
			<input type='file' name='travel2banner_bottom'>
			<?if( ms::meta('travel2banner_bottom') != '' ) { ?>
				<input type='hidden' name='travel2banner_bottom_remove' value='n'>
				<input type='checkbox' name='travel2banner_bottom_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>하단 배너 URL</div>
			<input type='text' name='travel2banner_bottom_text1' value='<?=ms::meta('travel2banner_bottom_text1')?>'>
		</td>
		
	</tr>
</table>
</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>