<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">

<table cellspacing='0' cellpadding='0' width='100%' class='content-table'>
	<tr valign='top'>
		<td class='left-content'>
			<div class='left-main-banner'>
				<img src="<?=x::theme_url('img/left_main_banner.png')?>"/>
			</div>
		</td>
		<td width='10' class='content-divider'></td>
		<td class='right-content'>
			<div class='right-main-banner'>
				<img src="<?=x::theme_url('img/right_main_banner.png')?>" class='right_main_banner_web'/>
				<img src="<?=x::theme_url('img/right_main_banner_400px.png')?>" class='right_main_banner_mobile'/>
			</div>
			<div class='right-lower-panel'>
				<div class='lower-left'>
					<div class='inner'>
						<div class='lower-title'>
							<a href='<?=G5_BBS_URL?>/board.php?bo_table=site_gallery'>사이트 갤러리</a>
						</div>		
						<div class='bottom-bar'></div>
						<?=latest('x-latest-site-gallery', 'site_gallery', 3)?>
						<? /*
						<div class='left-first-image-wrapper'><img src = '<?=x::url_theme()?>/img/lower-left.png' class='lower_left_image_web'/></div>
						<img src = '<?=x::url_theme()?>/img/lower-left_400px.png' class='lower_left_image_mobile'/>
						*/?>
					</div>
				</div>
				<div class='lower-middle'>
					<div class='inner'>
						<div class='lower-middle-title'>
							<a href='<?=g::url()?>/?page=template_main'>템플릿 갤러리</a>
						</div>
						<div class='bottom-bar'></div>
						<? include 'template_firstpage.php'; ?>
						<? /*
						<div class='lower-middle-1'><img src="<?=x::theme_url('img/middle_lower_1.png')?>"/></div>
						<div class='lower-middle-2'><img src="<?=x::theme_url('img/middle_lower_2.png')?>"/></div>
						<div class='lower-middle-3'><img src="<?=x::theme_url('img/middle_lower_3.png')?>"/></div>
						*/?>
						</div>
				</div>
				<div class='lower-right'>
					<div class='inner'>
						<?include x::theme('latest_posts')?>
					</div>
				</div>
				<div style='clear: both'></div>
			</div>
		</td>
	</tr>
</table>


