<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">

<table cellspacing='0' cellpadding='0' width='100%' class='content-table'>
	<tr valign='top'>
		<td class='left-content'>
			<div class='left-main-banner'>
				<img src="<?=x::theme_url('img/left_main_banner.png')?>" usemap="main_banner_map"/>
				<map name="main_banner_map">
					<!--top left-->
					<area shape="rect" coords="48,368,139,391" href="<?=G5_BBS_URL?>/board.php?bo_table=ms_www_5"/>
					
					<!--top right-->
					<area shape="rect" coords="205,360,326,389" href="<?=G5_BBS_URL?>/board.php?bo_table=ms_www_5"/>

					<!--bottom left-->
					<area shape="rect" coords="37,433,154,458" href="j<?=G5_BBS_URL?>/board.php?bo_table=ms_www_5"/>						
					
					<!--bottom right-->
					<area shape="rect" coords="206,433,325,460" href="j<?=G5_BBS_URL?>/board.php?bo_table=ms_www_5"/>						
				</map>
			</div>
		</td>
		<td width='20' class='content-divider'></td>
		<td class='right-content'>
			<div class='right-forum-container forum_one' >
				<div class='inner'>
					<div>
						<?=latest('x-latest-forums-extended-2', bo_table(4), 8, 20)?>
					</div>
				</div>
			</div>
			<div class='right-forum-container forum_two'>
				<div class='inner'>
					<div>
						<?=latest('x-latest-forums-extended-2', bo_table(2), 8, 20)?>					
					</div>
				</div>
			</div>
			<span style='clear: left; display: block;'></span>
			<table cellspacing='0' cellpadding='0' width='100%' class='template_and_skin'>
				<tr valign='top'>
					<td class='template-gallery-container'>
							<div class='inner'>
								<? include x::theme('template_gallery') ?>
							</div>
					</td>
					<td width='3.5%'></td>
					<td class='skin-gallery-container'>
						<div class='inner'>
							<? include x::theme('skin_gallery_thumbnail') ?>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


