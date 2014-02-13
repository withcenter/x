<div class='title'>Extra Options</div>
<table cellpadding=5px>
	<tr>
		<td valign='top'>
			<h2>Blog Profile Photo</h2>
			<?if( ms::meta('blog_profile_photo') ) {?><img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('blog_profile_photo')?>" width=280px height=160px><br><br><?}?>
			<input type='file' name='blog_profile_photo'>
			<?if( ms::meta('blog_profile_photo') != '' ) { ?>
				<input type='hidden' name='blog_profile_photo_remove' value='n'>
				<input type='checkbox' name='blog_profile_photo_remove' value='y'>Remove Image
			<?}?>
		</td>
		<td  valign='top'>
			<h2>Blog Profile Message</h2>
			<textarea name='blog_profile_message'><?=stripslashes(ms::meta('blog_profile_message'))?></textarea>
		</td>
	</tr>
</table>
