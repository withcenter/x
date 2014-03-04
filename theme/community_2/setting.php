<div class='config-wrapper'>
	<div class='config-title'><span class='config-global-info'>사이트로고 배너</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>	
	<div class='config-container'>
<table cellspacing='0' cellpadding='3' width='100%' class='image-config'>
	<tr valign='top'>
		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>사이트 로고</div>
			<div class='image-upload'>
			<?if( ms::meta('header_logo') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('header_logo').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [330px-width by 50px-height]</div>"; ?>
				<input type='file' name='header_logo'><br>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>

		<td>
				<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>메인 배너</div>
			<div class='image-upload'>
			<?if( ms::meta('com2banner_main') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com2banner_main').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [760px-width by 250px-height]</div>"; ?>
				<input type='file' name='com2banner_main'><br>
				<?if( ms::meta('com2banner_main') != '' ) { ?>
					<input type='hidden' name='com2banner_main_remove' value='n'>
					<input type='checkbox' name='com2banner_main_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
			</div>
		</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>하단 배너</div>
			<div class='image-upload'>
			<?if( ms::meta('com2banner_bottom') ) {
				echo "<img src=".ms::meta('img_url').ms::meta('com2banner_bottom').">"; 
			} else echo "<div class='setting-no-image'>NO-IMAGE: [760px-width by 130px-height]</div>"; ?>
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