<table cellpadding=10px width='100%' class='image-config'>
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>사이트 로고</div>
				<?if( ms::meta('header_logo') ) {?><img src="<?=ms::meta('img_url').ms::meta('header_logo')?>" width=280px height=160px><br><?}?>
				<input type='file' name='header_logo'>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>
		<td>
			<div class='image-upload'>
				<div class='title'>Company Banner</div>
				<?if( ms::meta('companybanner_1') ) {?><img src="<?=ms::meta('img_url').ms::meta('companybanner_1')?>" width=280px height=160px><br><?}?>
				<input type='file' name='companybanner_1'>
				<?if( ms::meta('companybanner_1') != '' ) { ?>
					<input type='hidden' name='companybanner_1_remove' value='n'>
					<input type='checkbox' name='companybanner_1_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>
	</tr>	
		<tr>
		<td colspan=2 align='center'><div class='title'>ROTATING BANNERS<div></th>
	</tr>
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>ROTATING BANNER 1</div>
				<?if( ms::meta('combanner_1') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_1')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_1'>
				<?if( ms::meta('combanner_1') != '' ) { ?>
					<input type='hidden' name='combanner_1_remove' value='n'>
					<input type='checkbox' name='combanner_1_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
				<div class='title'>Banner 1 Title</div>
				<input type='text' name='combanner_1_text1' value='<?=ms::meta('combanner_1_text1')?>'>
				<div class='title'>배너1의 문구1</div>
				<textarea name='combanner_1_text2'><?=stripslashes(ms::meta('combanner_1_text2'))?></textarea>
				<div class='title'>Banner 1 Link</div>
				<input type='text' name='combanner_1_text3' value='<?=ms::meta('combanner_1_text3')?>'>
			</div>
		</td>
 
		<td>
			<div class='image-upload'>
				<div class='title'>ROTATING BANNER 2</div>
				<?if( ms::meta('combanner_2') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_2')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_2'>
				<?if( ms::meta('combanner_2') != '' ) { ?>
					<input type='hidden' name='combanner_2_remove' value='n'>
					<input type='checkbox' name='combanner_2_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
				<div class='title'>Banner 2 Title</div>
				<input type='text' name='combanner_2_text1' value='<?=ms::meta('combanner_2_text1')?>'>
				<div class='title'>배너2의 문구1</div>
				<textarea name='combanner_2_text2'><?=stripslashes(ms::meta('combanner_2_text2'))?></textarea>
				<div class='title'>Banner 2 Link</div>
				<input type='text' name='combanner_2_text3' value='<?=ms::meta('combanner_2_text3')?>'>
			</div>
		</td>
	</tr>
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>ROTATING BANNER 3</div>
				<?if( ms::meta('combanner_3') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_3')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_3'>
				<?if( ms::meta('combanner_3') != '' ) { ?>
					<input type='hidden' name='combanner_3_remove' value='n'>
					<input type='checkbox' name='combanner_3_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
				<div class='title'>Banner 3 Title</div>
				<input type='text' name='combanner_3_text1' value='<?=ms::meta('combanner_3_text1')?>'>
				<div class='title'>배너1의 문구1</div>
				<textarea name='combanner_3_text2'><?=stripslashes(ms::meta('combanner_3_text2'))?></textarea>
				<div class='title'>Banner 3 Link</div>
				<input type='text' name='combanner_3_text3' value='<?=ms::meta('combanner_3_text3')?>'>
			</div>
		</td>

		<td>
			<div class='image-upload'>
				<div class='title'>ROTATING BANNER 4</div>
				<?if( ms::meta('combanner_4') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_4')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_4'>
				<?if( ms::meta('combanner_4') != '' ) { ?>
					<input type='hidden' name='combanner_4_remove' value='n'>
					<input type='checkbox' name='combanner_4_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
				<div class='title'>Banner 4 Title</div>
				<input type='text' name='combanner_4_text1' value='<?=ms::meta('combanner_4_text1')?>'>
				<div class='title'>배너2의 문구1</div>
				<textarea name='combanner_4_text2'><?=stripslashes(ms::meta('combanner_4_text2'))?></textarea>
				<div class='title'>Banner 4 Link</div>
				<input type='text' name='combanner_4_text3' value='<?=ms::meta('combanner_4_text3')?>'>
			</div>
		</td>
	</tr>
		<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>ROTATING BANNER 1</div>
				<?if( ms::meta('combanner_5') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_5')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_5'>
				<?if( ms::meta('combanner_5') != '' ) { ?>
					<input type='hidden' name='combanner_5_remove' value='n'>
					<input type='checkbox' name='combanner_5_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
				<div class='title'>Banner 5 Title</div>
				<input type='text' name='combanner_5_text1' value='<?=ms::meta('combanner_5_text1')?>'>
				<div class='title'>배너1의 문구1</div>
				<textarea name='combanner_5_text2'><?=stripslashes(ms::meta('combanner_5_text2'))?></textarea>
				<div class='title'>Banner 5 Link</div>
				<input type='text' name='combanner_5_text3' value='<?=ms::meta('combanner_5_text3')?>'>
			</div>
		</td>
	</tr>
	</tr>	
		<tr>
		<td colspan=2 align='center'><div class='title'>STATIC BANNER<div></th>
	</tr>
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>BANNER (Middle)</div>
				<?if( ms::meta('combanner_middle') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_middle')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_middle'>
				<?if( ms::meta('combanner_middle') != '' ) { ?>
					<input type='hidden' name='combanner_middle_remove' value='n'>
					<input type='checkbox' name='combanner_middle_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>

		<td>
			<div class='image-upload'>
				<div class='title'>BANNER (Bottom)</div>
				<?if( ms::meta('combanner_bottom') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_bottom')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_bottom'>
				<?if( ms::meta('combanner_bottom') != '' ) { ?>
					<input type='hidden' name='combanner_bottom_remove' value='n'>
					<input type='checkbox' name='combanner_bottom_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>
	</tr>
		</tr>
		<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>SIDEBAR Banner</div>
				<?if( ms::meta('combanner_sidebar') ) {?><img src="<?=ms::meta('img_url').ms::meta('combanner_sidebar')?>" width=280px height=160px><br><?}?>
				<input type='file' name='combanner_sidebar'>
				<?if( ms::meta('combanner_sidebar') != '' ) { ?>
					<input type='hidden' name='combanner_sidebar_remove' value='n'>
					<input type='checkbox' name='combanner_sidebar_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
				<div class='title'>SIDEBAR Banner Title</div>
				<input type='text' name='combanner_sidebar_text1' value='<?=ms::meta('combanner_sidebar_text1')?>'>
			</div>
		</td>
	</tr>
	</tr>	
	<tr>
		<td colspan=2 align='center'><div class='title'>TOP MENU and FOOTER LINKS<div></th>
	</tr>
		<tr valign='top'>
		<td>
			<div class='title'>Contact Number</div>
			<input type='text' name='comheader_contact_number' value='<?=ms::meta('comheader_contact_number')?>'>
		</td>
		<td>
			<div class='title'>Contact Email</div>
			<input type='text' type='text' name='comheader_email' value='<?=ms::meta('comheader_email')?>'>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='title'>About</div>
			<textarea name='comfooter_about'><?=ms::meta('comfooter_about')?></textarea>
		</td>
		<td>
			<div class='title'>Terms and Conditions</div>
			<textarea type='text' name='comfooter_terms' ><?=ms::meta('comfooter_terms')?></textarea>
		</td>
	</tr>
	<tr valign='top'>
		<td>
			<div class='title'>Privacy Policy</div>
			<textarea type='text' name='comfooter_privacy' ><?=ms::meta('comfooter_privacy')?></textarea>
		</td>
		<td>
			<div class='title'>FAQs</div>
			<textarea name='comfooter_faqs'><?=ms::meta('comfooter_faqs')?></textarea>
		</td>
	</tr>
</table>