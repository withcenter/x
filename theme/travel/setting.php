<div class='title'>Extra Options</div>
<table cellpadding=5px class='image-config'>
	<tr valign='top'>
		<td>
			<div class='title'>배너이미지1</div>
			<?if( ms::meta('banner_1') ) {?><img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('banner_1')?>" width=280px height=160px><br><?}?>
			<input type='file' name='banner_1'>
			<?if( ms::meta('banner_1') != '' ) { ?>
				<input type='hidden' name='banner_1_remove' value='n'>
				<input type='checkbox' name='banner_1_remove' value='y'><span class='title-small'>Remove Image</span>
			<?}?>
			<div class='title'>배너1의 문구1</div>
			<textarea name='banner1_text1'><?=stripslashes(ms::meta('banner1_text1'))?></textarea>
			<div class='title'>배너1의 문구2</div>
			<textarea name='banner1_text2'><?=stripslashes(ms::meta('banner1_text2'))?>'</textarea>
		</td>

		<td>
			<div class='title'>배너이미지2</div>
			<?if( ms::meta('banner_2') ) {?><img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('banner_2')?>" width=280px height=160px><br><?}?>
			<input type='file' name='banner_2'>
			<?if( ms::meta('banner_2') != '' ) { ?>
				<input type='hidden' name='banner_2_remove' value='n'>
				<input type='checkbox' name='banner_2_remove' value='y'><span class='title-small'>Remove Image</span>
			<?}?>
			<div class='title'>배너2의 문구1</div>
			<textarea name='banner2_text1'><?=stripslashes(ms::meta('banner2_text1'))?></textarea>
			<div class='title'>배너2의 문구2</div>
			<textarea name='banner2_text2'><?=stripslashes(ms::meta('banner2_text2'))?>'</textarea>
		</td>
	</tr>
</table>