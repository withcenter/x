  <div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>ADDITIONAL SITE INFORMATION</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
		<div>
			<span class='title-small'>Contact Number 1: </span><input type='text' name='travel2contact_num1' value='<?=ms::meta('travel2contact_num1')?>'>
			<span class='title-small'>Office Hours 1: </span><input type='text' name='travel2contact_hours1' value='<?=ms::meta('travel2contact_hours1')?>'>		
		</div>
		<br>
		<div>
			<span class='title-small'>Contact Number 2: </span><input type='text' name='travel2contact_num2' value='<?=ms::meta('travel2contact_num2')?>'>
			<span class='title-small'>Office Hours 2: </span><input type='text' name='travel2contact_hours2' value='<?=ms::meta('travel2contact_hours2')?>'>		
		</div>
	</div>
</div>

<div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>HEADER LOGO AND COMPANY BANNER</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
<table cellpadding=5 class='image-config' width='100%'>
	<tr valign='top' >
		<td width='50%'>
			<div class='image-title'>사이트 로고</div>
			<div class='image-upload'>
				<?if( ms::meta('header_logo') ) {?><img src="<?=ms::meta('img_url').ms::meta('header_logo')?>" width=280px height=160px><br><?}?>
				<input type='file' name='header_logo'>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>
		<td width='50%'>
			<div class='image-title'>회사로고</div>
			<div class='image-upload'>
				<?if( ms::meta('travel2banner_company') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_company')?>" width=280px height=160px><br><?}?>
				<input type='file' name='travel2banner_company'>
				<?if( ms::meta('travel2banner_company') != '' ) { ?>
					<input type='hidden' name='travel2banner_company_remove' value='n'>
					<input type='checkbox' name='travel2banner_company_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>
	</tr>
</table>
</div>
</div>
 <div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>MAIN BANNER (Rotating)</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
	<table cellpadding=5 class='image-config' width='100%'>
	<tr valign='top'>
		<td>
			<div class='image-title'>배너이미지1</div>
			<div class='image-upload'>
				<?if( ms::meta('travel2banner_1') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_1')?>" width=280px height=160px><br><?}?>
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
			<div class='image-title'>배너이미지2</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_2') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_2')?>" width=280px height=160px><br><?}?>
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
			<div class='image-title'>배너이미지3</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_3') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_3')?>" width=280px height=160px><br><?}?>
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
			<div class='image-title'>배너이미지4</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_4') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_4')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travel2banner_4'>
			<?if( ms::meta('travel2banner_4') != '' ) { ?>
				<input type='hidden' name='travel2banner_4_remove' value='n'>
				<input type='checkbox' name='travel2banner_4_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너3의 문구</div>
			<textarea name='travel2banner_4_text1'><?=stripslashes(ms::meta('travel2banner_4_text1'))?></textarea>
				<div class='title'>배너4 링크</div>
				<input type='text' name='travel2banner_4_text2' value='<?=ms::meta('travel2banner_4_text2')?>'>
			</div>
		</td>
	</tr>
		<tr valign='top'>
		<td>
			<div class='image-title'>배너이미지5</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_5') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_5')?>" width=280px height=160px><br><?}?>
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
	<div class='config-title'><span class='config-title-info'>SIDEBAR, MIDDLE, and BOTTOM BANNERS</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
	<table cellpadding=5 class='image-config' width='100%'>	
		<tr valign='top'>
		<td>
			<div class='image-title'>SIDEBAR BANNER 1 (Left)</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner1_sidebar') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner1_sidebar')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travel2banner1_sidebar'>
			<?if( ms::meta('travel2banner1_sidebar') != '' ) { ?>
				<input type='hidden' name='travel2banner1_sidebar_remove' value='n'>
				<input type='checkbox' name='travel2banner1_sidebar_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>SIDEBAR BANNER 1 URL</div>
			<input type='text' name='travel2banner1_sidebar_text1' value='<?=ms::meta('travel2banner1_sidebar_text1')?>'>
		</td>
		<td>
			<div class='image-title'>SIDEBAR BANNER 2 (Left)</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner2_sidebar') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner2_sidebar')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travel2banner2_sidebar'>
			<?if( ms::meta('travel2banner2_sidebar') != '' ) { ?>
				<input type='hidden' name='travel2banner2_sidebar_remove' value='n'>
				<input type='checkbox' name='travel2banner2_sidebar_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>SIDEBAR BANNER 2 URL</div>
			<input type='text' name='travel2banner2_sidebar_text1' value='<?=ms::meta('travel2banner2_sidebar_text1')?>'>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'>SIDEBAR BANNER 3 (Left)</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner3_sidebar') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner3_sidebar')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travel2banner3_sidebar'>
			<?if( ms::meta('travel2banner3_sidebar') != '' ) { ?>
				<input type='hidden' name='travel2banner3_sidebar_remove' value='n'>
				<input type='checkbox' name='travel2banner3_sidebar_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>SIDEBAR BANNER 3 URL</div>
			<input type='text' name='travel2banner3_sidebar_text1' value='<?=ms::meta('travel2banner3_sidebar_text1')?>'>
		</td>
		<td>
			<div class='image-title'>SIDEBAR BANNER 4 (Right)</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner4_sidebar') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner4_sidebar')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travel2banner4_sidebar'>
			<?if( ms::meta('travel2banner4_sidebar') != '' ) { ?>
				<input type='hidden' name='travel2banner4_sidebar_remove' value='n'>
				<input type='checkbox' name='travel2banner4_sidebar_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>SIDEBAR BANNER 4 URL</div>
			<input type='text' name='travel2banner4_sidebar_text1' value='<?=ms::meta('travel2banner4_sidebar_text1')?>'>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'>BOTTOM BANNER</div>
			<div class='image-upload'>
			<?if( ms::meta('travel2banner_bottom') ) {?><img src="<?=ms::meta('img_url').ms::meta('travel2banner_bottom')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travel2banner_bottom'>
			<?if( ms::meta('travel2banner_bottom') != '' ) { ?>
				<input type='hidden' name='travel2banner_bottom_remove' value='n'>
				<input type='checkbox' name='travel2banner_bottom_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>BOTTOM BANNER URL</div>
			<input type='text' name='travel2banner_bottom_text1' value='<?=ms::meta('travel2banner_bottom_text1')?>'>
		</td>
	</tr>
</table>
</div>
</div>