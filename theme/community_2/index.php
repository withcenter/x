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
				<?
					$cache_time = 1;
					if( g::forum_exist($forum_1) ) { 
					$option = array(
					'no' => 1,
					'icon' => x::url_theme().'/img/icon1.gif'
					);
				
				?><td width='33%' class='latest_1'><?=latest('x-latest-community-2',$forum_1, 6, 60, $cache_time, $option )?></td> <?}?>
				<? if ( g::forum_exist($forum_2) ) {
					$option = array(
					'no' => 2,
					'icon' => x::url_theme().'/img/icon2.gif'
					);
				?><td width='34%' class='latest_2'><?=latest('x-latest-community-2',$forum_2, 6, 60, $cache_time, $option)?></td> <?}?>
				<? if ( g::forum_exist($forum_3) ) {
					$option = array(
					'no' => 3,
					'icon' => x::url_theme()."/img/icon3.gif",
					);				
				?><td width='33%' class='latest_3'><?=latest('x-latest-community-2',$forum_3, 6, 60, $cache_time, $option)?></td> <?}?>
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
				<? if ( g::forum_exist($forum_4) ) {
					$option = array(
					'no' => 4,
					'icon' => x::url_theme()."/img/icon4.gif",
					);					
				?><td width='33%' class='latest_1'><?=latest('x-latest-community-2',$forum_4, 6, 60, $cache_time, $option )?></td> <?}?>
				<? if ( g::forum_exist($forum_5) ) {
					$option = array(
					'no' => 5,
					'icon' => x::url_theme()."/img/icon5.gif",
					);		
				?><td width='34%' class='latest_2'><?=latest('x-latest-community-2',$forum_5, 6, 60, $cache_time, $option )?></td> <?}?>
				<? if ( g::forum_exist($forum_6) ) {
					$option = array(
					'no' => 6,
					'icon' => x::url_theme()."/img/icon6.gif",
					);						
				?><td width='33%' class='latest_3'><?=latest('x-latest-community-2',$forum_6, 6, 60, $cache_time, $option )?></td> <?}?>
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