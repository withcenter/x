<?php
	if ( $in['page'] ) include x::theme( $in['page'] );
	else {?>
	
		<table class='main-top' cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td width=550><img src='<?=x::url()?>/theme/withcenter/img/main_banner.png' /></td>
				<td width=10></td>
				<td class='application'><? include 'application.form.php'; ?></td>
			</tr>
		</table>
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td width='33%' class='latest_1'><?=latest('x-latest-withcenter','withcenter1', 6, 60, 1, x::url_theme().'/img/icon1.gif')?></td>
				<td width='34%' class='latest_2'><?=latest('x-latest-withcenter','withcenter2', 6, 60, 1, x::url_theme().'/img/icon2.gif')?></td>
				<td width='33%' class='latest_3'><?=latest('x-latest-withcenter','withcenter3', 6, 60, 1, x::url_theme().'/img/icon3.gif')?></td>
			</tr>
		</table>
		<div class='bottom-banner'><img src='<?=x::url()?>/theme/withcenter/img/bottom_banner.png' /></div>
		
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td width='33%' class='latest_1'><?=latest('x-latest-withcenter','withcenter4', 6, 60, 1, x::url_theme().'/img/icon1.gif')?></td>
				<td width='34%' class='latest_2'><?=latest('x-latest-withcenter','withcenter5', 6, 60, 1, x::url_theme().'/img/icon3.gif')?></td>
				<td width='33%' class='latest_3'><?=latest('x-latest-withcenter','withcenter6', 6, 60, 1, x::url_theme().'/img/icon3.gif')?></td>
			</tr>
		</table>
		
		<div class='latest_4'>
			<? 
				$option = array('bo_table' => 'withcenter1');
				include x::dir().'/theme/withcenter/bottom_latest.php';
			?>
		</div>
	<?}
