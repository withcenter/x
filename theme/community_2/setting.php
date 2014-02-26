<div class='config-wrapper'>
	<div class='config-title'>사이트로고 배너</div>	
	<div class='config-container'>
<table cellpadding=5 width='100%' class='image-config'>
	<tr valign='top'>
		<td>
			<div class='image-title'>사이트 로고</div>
			<div class='image-upload'>
				<?if( ms::meta('header_logo') ) {?><img src="<?=ms::meta('img_url').ms::meta('header_logo')?>" width=280px height=160px><br><?}?>
				<input type='file' name='header_logo'><br>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>

		<td>
				<div class='image-title'>메인 배너</div>
			<div class='image-upload'>
				<?if( ms::meta('com2banner_main') ) {?><img src="<?=ms::meta('img_url').ms::meta('com2banner_main')?>" width=280px height=160px><br><?}?>
				<input type='file' name='com2banner_main'><br>
				<?if( ms::meta('com2banner_main') != '' ) { ?>
					<input type='hidden' name='com2banner_main_remove' value='n'>
					<input type='checkbox' name='com2banner_main_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>

		<td>
			<div class='image-title'>하단 배너</div>
			<div class='image-upload'>
				<?if( ms::meta('com2banner_bottom') ) {?><img src="<?=ms::meta('img_url').ms::meta('com2banner_bottom')?>" width=280px height=160px><br><?}?>
				<input type='file' name='com2banner_bottom'><br>
				<?if( ms::meta('com2banner_bottom') != '' ) { ?>
					<input type='hidden' name='com2banner_bottom_remove' value='n'>
					<input type='checkbox' name='com2banner_bottom_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>
	</tr>
</table>
</div>
</div>