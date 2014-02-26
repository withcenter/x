<div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>HEADER LOGO and BANNERS</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
<table cellpadding=5 class='image-config' width='100%'>
	<tr valign='top'>
		<td colspan=2>
			<div class='image-title'>사이트 로고</div>
			<div class='image-upload'>
				<?if( ms::meta('header_logo') ) {?><img src="<?=ms::meta('img_url').ms::meta('header_logo')?>" width=280px height=160px><br><?}?>
				<input type='file' name='header_logo'><br>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
				<div class='title'>로고 문구</div>
				<textarea name='logo_text'><?=stripslashes(ms::meta('logo_text'))?></textarea>
			</div>
		</td>
	</tr>	
	<tr valign='top'>
		<td>
			<div class='image-title'>배너이미지1</div>
			<div class='image-upload'>
				<?if( ms::meta('travelbanner_1') ) {?><img src="<?=ms::meta('img_url').ms::meta('travelbanner_1')?>" width=280px height=160px><br><?}?>
				<input type='file' name='travelbanner_1'>
				<?if( ms::meta('travelbanner_1') != '' ) { ?>
					<input type='hidden' name='travelbanner_1_remove' value='n'>
					<input type='checkbox' name='travelbanner_1_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
				<div class='title'>배너1의 문구</div>
				<textarea name='travelbanner_1_text1'><?=stripslashes(ms::meta('travelbanner_1_text1'))?></textarea>
			</div>
		</td>
 
		<td>
			<div class='image-title'>배너이미지2</div>
			<div class='image-upload'>
			<?if( ms::meta('travelbanner_2') ) {?><img src="<?=ms::meta('img_url').ms::meta('travelbanner_2')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travelbanner_2'>
			<?if( ms::meta('travelbanner_2') != '' ) { ?>
				<input type='hidden' name='travelbanner_2_remove' value='n'>
				<input type='checkbox' name='travelbanner_2_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너2의 문구</div>
			<textarea name='travelbanner_2_text1'><?=stripslashes(ms::meta('travelbanner_2_text1'))?></textarea>
			</div>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='image-title'>배너이미지3</div>
			<div class='image-upload'>
			<?if( ms::meta('travelbanner_3') ) {?><img src="<?=ms::meta('img_url').ms::meta('travelbanner_3')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travelbanner_3'>
			<?if( ms::meta('travelbanner_3') != '' ) { ?>
				<input type='hidden' name='travelbanner_3_remove' value='n'>
				<input type='checkbox' name='travelbanner_3_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너3의 문구</div>
			<textarea name='travelbanner_3_text1'><?=stripslashes(ms::meta('travelbanner_3_text1'))?></textarea>
			</div>
		</td>

		<td>
			<div class='image-title'>배너이미지4</div>
			<div class='image-upload'>
			<?if( ms::meta('travelbanner_4') ) {?><img src="<?=ms::meta('img_url').ms::meta('travelbanner_4')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travelbanner_4'>
			<?if( ms::meta('travelbanner_4') != '' ) { ?>
				<input type='hidden' name='travelbanner_4_remove' value='n'>
				<input type='checkbox' name='travelbanner_4_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너3의 문구</div>
			<textarea name='travelbanner_4_text1'><?=stripslashes(ms::meta('travelbanner_4_text1'))?></textarea>
			</div>
		</td>
	</tr>
		<tr valign='top'>
		<td>
			<div class='image-title'>배너이미지5</div>
			<div class='image-upload'>
			<?if( ms::meta('travelbanner_5') ) {?><img src="<?=ms::meta('img_url').ms::meta('travelbanner_5')?>" width=280px height=160px><br><?}?>
			<input type='file' name='travelbanner_5'>
			<?if( ms::meta('travelbanner_5') != '' ) { ?>
				<input type='hidden' name='travelbanner_5_remove' value='n'>
				<input type='checkbox' name='travelbanner_5_remove' value='y'><span class='title-small'>이미지 제거</span>
			<?}?>
			<div class='title'>배너5의 문구</div>
			<textarea name='travelbanner_5_text1'><?=stripslashes(ms::meta('travelbanner_5_text1'))?></textarea>
			</div>
		</td>

		<td>
	
		</td>
	</tr>
</table>
</div>
</div>