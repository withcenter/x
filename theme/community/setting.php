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
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>배너이미지1</div>
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
			</div>
		</td>
 
		<td>
			<div class='image-upload'>
				<div class='title'>배너이미지2</div>
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
			</div>
		</td>
	</tr>
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>배너이미지3</div>
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
			</div>
		</td>

		<td>
			<div class='image-upload'>
				<div class='title'>배너이미지4</div>
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
			</div>
		</td>
	</tr>
		<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>배너이미지1</div>
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
			</div>
		</td>

		<td>
	
		</td>
	</tr>
</table>