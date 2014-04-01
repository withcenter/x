		<table class='main-top' cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td>
					<?	if(  file_exists(x::path_file('banner')) ) {?>
							<img src="<?=x::url_file('banner')?>">
					<?}
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
					$option = array(
					'icon' => x::url_theme().'/img/icon1.gif'
					);
				
				?><td width='33%' class='latest_1'><?=latest('x-latest-community-2', bo_table(1), 6, 20, $cache_time, $option )?></td>
				<?
					$option = array(
					'icon' => x::url_theme().'/img/icon2.gif'
					);
				?><td width='34%' class='latest_2'><?=latest('x-latest-community-2', bo_table(2), 6, 20, $cache_time, $option)?></td> 
				<?
					$option = array(
					'icon' => x::url_theme()."/img/icon3.gif",
					);				
				?><td width='33%' class='latest_3'><?=latest('x-latest-community-2', bo_table(3), 6, 20, $cache_time, $option)?></td> 
			</tr>
		</table>
		<div class='bottom-banner'>
			<?if( file_exists(x::path_file('banner_bottom')) ) {?>
				<img src="<?=x::url_file('banner_bottom')?>" />
			<?} else {?>
					<div class='no-image-banner bottom-no-image-banner'>
						<img src='<?=x::url_theme()?>/img/no_bottom_banner.png' />
					</div>
			<?}?>
		</div>
		
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<?php
					$option = array(
					'no' => 4,
					'icon' => x::url_theme()."/img/icon4.gif",
					);					
				?><td width='33%' class='latest_1'><?=latest('x-latest-community-2', bo_table(4), 6, 20, $cache_time, $option )?></td>
				<? 
					$option = array(
					'no' => 5,
					'icon' => x::url_theme()."/img/icon5.gif",
					);		
				?><td width='34%' class='latest_2'><?=latest('x-latest-community-2',bo_table(5), 6, 20, $cache_time, $option )?></td>
				<?
					$option = array(
					'no' => 6,
					'icon' => x::url_theme()."/img/icon6.gif",
					);						
				?><td width='33%' class='latest_3'><?=latest('x-latest-community-2',bo_table(6), 6, 20, $cache_time, $option )?></td> 
			</tr>
		</table>
		<? if ( g::forum_exist($forum_1 = x::board_id ( $domain ).'_1' ) ) { ?>
			<div class='latest_4'>
				<? 
				
					$option = array('bo_table' => $forum_1);
					include x::dir().'/theme/community_2/bottom_latest.php';
				?>
			</div>
		<? }?>