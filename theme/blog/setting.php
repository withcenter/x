<div class='config-wrapper'>
	<div class='config-title'><span class='config-title-info'>Profile Picture and Information</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
	<div class='config-container'>
		<table cellpadding='10' cellspacing='0' class='image-config'>
		<tr>
			<td valign='top'>
				<div class='image-title'>프로필 사진등록</div>

				<div class='image-upload'>
				<?if( ms::meta('blog_profile_photo') ) {
					echo "<img src=".ms::meta('img_url').ms::meta('blog_profile_photo').">"; 
				} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 190px X 세로 140px]</div>"; ?>
				<input type='file' name='blog_profile_photo'>
				<?if( ms::meta('blog_profile_photo') != '' ) { ?>
					<input type='hidden' name='blog_profile_photo_remove' value='n'>
					<input type='checkbox' name='blog_profile_photo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
				</div>
			</td>
			<td  valign='top'>
				<div class='image-title'>프로필 하단 문구</div>
			
				<textarea name='blog_profile_message' style='border-top: 0; padding: 10px;'><?=stripslashes(ms::meta('blog_profile_message'))?></textarea>
			</td>
		</tr>
	</table>
</div>
</div>
