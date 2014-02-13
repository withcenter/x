Extra Options
<div class='title'>프로필 이미지</div>
<?if( ms::meta('blog_profile_photo') ) {?><img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('blog_profile_photo')?>" width=280px height=160px><br><?}?>
<input type='file' name='blog_profile_photo'><br>
Profile Message: <br>
<input type='text' name='blog_profile_message' value='<?=ms::meta('blog_profile_message')?>'>