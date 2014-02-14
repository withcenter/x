<span class='title-small'>상단 문구(HeaderText)</span><input type='text' name='header_text' value='<?=ms::meta('header_text')?>'>	
<table cellpadding=0 cellspacing=0 width='100%' class='image-config'>
	<tr valign='top'>
		<td>
			<div class='title'>사이트 로고</div>
			<?if( ms::meta('header_logo') ) {?><img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('header_logo')?>" width=280px height=160px><br><?}?>
			<input type='file' name='header_logo'>
			<?if( ms::meta('header_logo') != '' ) { ?>
				<input type='hidden' name='header_logo_remove' value='n'>
				<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>Remove Image</span>
			<?}?>
		</td>
		<td>
			<div class='title'>로고 문구</div>
			<textarea name='logo_text'><?=stripslashes(ms::meta('logo_text'))?></textarea>
		</td>
	</tr>
</table>

					