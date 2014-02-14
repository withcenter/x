<table cellpadding=5px class='image-config'>
	<tr>
		<td valign='top'>
			<div class='title'>Blog Profile Photo</div>
			<?if( ms::meta('blog_profile_photo') ) {?><img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('blog_profile_photo')?>" width=280px height=160px><br><br><?}?>
			<input type='file' name='blog_profile_photo'>
			<?if( ms::meta('blog_profile_photo') != '' ) { ?>
				<input type='hidden' name='blog_profile_photo_remove' value='n'>
				<input type='checkbox' name='blog_profile_photo_remove' value='y'><span class='title-small'>Remove Image</span>
			<?}?>
		</td>
		<td  valign='top'>
			<div class='title'>Blog Profile Message</div>
			<textarea name='blog_profile_message'><?=stripslashes(ms::meta('blog_profile_message'))?></textarea>
		</td>
	</tr>
</table>
