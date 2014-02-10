<?php
	if ( $in['page'] ) include x::theme( $in['page'] );
	else {?>

		<style>
			.layout .main-content .latest_1 .withcenter_latest .title .top-title:before {
				content: url('<?=x::url()?>/theme/withcenter/img/icon1.gif');
				margin-right: 9px;
				position: relative;
				top: 3px;
			}
			.layout .main-content .latest_2 .withcenter_latest .title .top-title:before {
				content: url('<?=x::url()?>/theme/withcenter/img/icon2.gif');
				margin-right: 9px;
				position: relative;
				top: 3px;
			}
			.layout .main-content .latest_3 .withcenter_latest .title .top-title:before {
				content: url('<?=x::url()?>/theme/withcenter/img/icon3.gif');
				margin-right: 9px;
				position: relative;
				top: 3px;
			}
		</style>
		<table class='main-top' cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td><img src='<?=x::url()?>/theme/withcenter/img/main_banner.png' /></td>
				<td width=10></td>
				<td></td>
			</tr>
		</table>
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td class='latest_1'><?=latest('withcenter_latest','withcenter1', 6, 60)?></td>
				<td width=10></td>
				<td class='latest_2'><?=latest('withcenter_latest','withcenter2', 6, 60)?></td>
				<td width=10></td>
				<td class='latest_3'><?=latest('withcenter_latest','withcenter3', 6, 60)?></td>
			</tr>
		</table>
		<div class='bottom-banner'><img src='<?=x::url()?>/theme/withcenter/img/bottom_banner.png' /></div>
		
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td class='latest_1'><?=latest('withcenter_latest','withcenter4', 6, 60)?></td>
				<td width=10></td>
				<td class='latest_2'><?=latest('withcenter_latest','withcenter5', 6, 60)?></td>
				<td width=10></td>
				<td class='latest_3'><?=latest('withcenter_latest','withcenter6', 6, 60)?></td>
			</tr>
		</table>
		
		<div class='latest_4'>
			<? 
				$option = array('bo_table' => 'withcenter1');
				include x::dir().'/theme/withcenter/bottom_latest.php';
			?>
		</div>
	<?}
