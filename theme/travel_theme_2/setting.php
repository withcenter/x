  <div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>사이트 추가 설정</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container' cellspacing='0' cellpadding='3' >
		<table>
			<tr>
				<td><span class='title-small'>전화번호1: </span><input type='text' name='travel2contact_num1' value='<?=ms::meta('travel2contact_num1')?>'></td>
				<td><span class='title-small'>운영시간1: </span><input type='text' name='travel2contact_hours1' value='<?=ms::meta('travel2contact_hours1')?>'></td>
			</tr>
			<tr>
				<td><span class='title-small'>전화번호2: </span><input type='text' name='travel2contact_num2' value='<?=ms::meta('travel2contact_num2')?>'></td>
				<td><span class='title-small'>운영시간2: </span><input type='text' name='travel2contact_hours2' value='<?=ms::meta('travel2contact_hours2')?>'>	</td>	
			</tr>
			<tr>
				<td><span class='title-small'>이메일1 </span><input type='text' name='travel2email_num1' value='<?=ms::meta('travel2email_num1')?>'></td>
				<td><span class='title-small'>이메일2: </span><input type='text' name='travel2email_num2' value='<?=ms::meta('travel2email_num2')?>'></td>		
			</tr>
			<tr>
				<td><span class='title-small'>사업자 등록번호</span><input type='text' name='travel2permit_1' value='<?=ms::meta('travel2permit_1')?>'></td>
				<td><span class='title-small'>사업자 등록회사명 : </span><input type='text' name='travel2plate_1' value='<?=ms::meta('travel2plate_1')?>'></td>		
			</tr>
			<tr>
				<td colspan='2'><span class='title-small'>하단 문구 제목: </span><input type='text' name='travel2footer_tagline' value='<?=ms::meta('travel2footer_tagline')?>' /></td>
			<tr>
		</table>
	</div>
</div>

<div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>사이트 상하단 로고 & 로고 문구</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
<table cellspacing='0' cellpadding='3' class='image-config' width='100%'>
	<tr valign='top' >
		<td width='50%'> 
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>사이트 상단 로고</div>
			<div class='image-upload'>
			<?if( ms::meta('header_logo') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('header_logo').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [310px-width by 60px-height]</div>"; ?>
				<input type='file' name='header_logo'>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>
		<td width='50%'>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>사이트 하단 로고</div>
			<div class='image-upload'>
			<?if( ms::meta('footer_logo') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('footer_logo').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [100px-width by 90px-height]</div>"; ?>
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
</div>
 <div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>메인 롤링 배너</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
	<table cellspacing='0' cellpadding='3' class='image-config' width='100%'>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>배너이미지1</div>
			<div class='image-upload'>
				<?if( ms::meta('travel2banner_1') ) {
					echo "<img src=".ms::meta('img_url').ms::meta('travel2banner_1').">"; 
				} else echo "<div class='setting-no-image'>NO-IMAGE: [750px-width by 240px-height]</div>"; ?>
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
			} else echo "<div class='setting-no-image'>NO-IMAGE: [750px-width by 240px-height]</div>"; ?>
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
			} else echo "<div class='setting-no-image'>NO-IMAGE: [750px-width by 240px-height]</div>"; ?>
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
			} else echo "<div class='setting-no-image'>NO-IMAGE: [750px-width by 240px-height]</div>"; ?>
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
			} else echo "<div class='setting-no-image'>NO-IMAGE: [750px-width by 240px-height]</div>"; ?>
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
</div>
 <div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>오른쪽 날개 배너</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
	<table cellspacing='0' cellpadding='3' class='image-config' width='100%'>	
		<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 날개 배너1</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner1_floating') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner1_floating').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [70px-width by 70px-height]</div>"; ?>
			<input type='file' name='travel2banner1_floating'>
			<?if( ms::meta('travel2banner1_floating') != '' ) { ?>
				<input type='hidden' name='travel2banner1_floating_remove' value='n'>
				<input type='checkbox' name='travel2banner1_floating_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 날개 배너1 URL</div>
			<input type='text' name='travel2banner1_floating_text1' value='<?=ms::meta('travel2banner1_floating_text1')?>'>
		</td>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 날개 배너2</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner2_floating') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner2_floating').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [70px-width by 70px-height]</div>"; ?>
			<input type='file' name='travel2banner2_floating'>
			<?if( ms::meta('travel2banner2_floating') != '' ) { ?>
				<input type='hidden' name='travel2banner2_floating_remove' value='n'>
				<input type='checkbox' name='travel2banner2_floating_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 날개 배너2 URL</div>
			<input type='text' name='travel2banner2_floating_text1' value='<?=ms::meta('travel2banner2_floating_text1')?>'>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 날개 배너3</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner3_floating') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner3_floating').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [70px-width by 70px-height]</div>"; ?>
			<input type='file' name='travel2banner3_floating'>
			<?if( ms::meta('travel2banner3_floating') != '' ) { ?>
				<input type='hidden' name='travel2banner3_floating_remove' value='n'>
				<input type='checkbox' name='travel2banner3_floating_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>오른쪽 날개 배너3 URL</div>
			<input type='text' name='travel2banner3_floating_text1' value='<?=ms::meta('travel2banner3_floating_text1')?>'>
		</td>
	</tr>
</table>
</div>
</div>
 <div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>중앙 사이드 배너, 하단 배너</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
	<table cellspacing='0' cellpadding='3' class='image-config' width='100%'>	
		<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>왼쪽 사이드 배너</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner1_sidebar') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('travel2banner1_sidebar').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [210px-width by 90px-height]</div>"; ?>
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
			} else echo "<div class='setting-no-image'>NO-IMAGE: [210px-width by 90px-height]</div>"; ?>
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
			} else echo "<div class='setting-no-image'>NO-IMAGE: [970px-width by 170px-height]</div>"; ?>
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
</div>