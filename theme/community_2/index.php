		<table class='main-top' cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td>
					<?	if( ms::meta('com2banner_main') ) {?>
							<img src="<?=ms::meta('img_url').ms::meta('com2banner_main')?>"><?
						}
						else {?>
							<div class='no-image-banner'>
								<img src='<?=x::url_theme()?>/img/no_main_banner.png' />
							</div>
						<?}
					?>
				</td>
			</tr>
		</table>
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<? if( g::forum_exist($forum_1) ) { ?><td width='33%' class='latest_1'><?=latest('x-latest-community-2',$forum_1, 6, 60, 1, x::url_theme().'/img/icon1.gif')?></td> <?}?>
				<? if ( g::forum_exist($forum_2) ) { ?><td width='34%' class='latest_2'><?=latest('x-latest-community-2',$forum_2, 6, 60, 1, x::url_theme().'/img/icon2.gif')?></td> <?}?>
				<? if ( g::forum_exist($forum_3) ) { ?><td width='33%' class='latest_3'><?=latest('x-latest-community-2',$forum_3, 6, 60, 1, x::url_theme().'/img/icon3.gif')?></td> <?}?>
			</tr>
		</table>
		<div class='bottom-banner'>
			<?if( ms::meta('com2banner_bottom') ) {?>
				<img src="<?=ms::meta('img_url').ms::meta('com2banner_bottom')?>" />
			<?} else {?>
					<div class='no-image-banner bottom-no-image-banner'>
						<img src='<?=x::url_theme()?>/img/no_bottom_banner.png' />
					</div>
			<?}?>
		</div>
		
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<? if ( g::forum_exist($forum_4) ) { ?><td width='33%' class='latest_1'><?=latest('x-latest-community-2',$forum_4, 6, 60, 1, x::url_theme().'/img/icon1.gif')?></td> <?}?>
				<? if ( g::forum_exist($forum_5) ) { ?><td width='34%' class='latest_2'><?=latest('x-latest-community-2',$forum_5, 6, 60, 1, x::url_theme().'/img/icon3.gif')?></td> <?}?>
				<? if ( g::forum_exist($forum_6) ) { ?><td width='33%' class='latest_3'><?=latest('x-latest-community-2',$forum_6, 6, 60, 1, x::url_theme().'/img/icon3.gif')?></td> <?}?>
			</tr>
		</table>
		<? if ( g::forum_exist($forum_1) ) { ?>
			<div class='latest_4'>
				<? 
				
					$option = array('bo_table' => $forum_1);
					include x::dir().'/theme/community_2/bottom_latest.php';
				?>
			</div>
		<? }?>