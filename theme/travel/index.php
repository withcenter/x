<table width='100%' class='index-banner'>
	<tr>
		<td align='left' valign='top'>
			<?if( ms::meta('banner_1') ) {?><img src="<?=ms::meta('img_url').ms::meta('banner_1')?>"><?}?>
		</td>
		<td align='right' valign='top'>
			<?if( ms::meta('banner_2') ) {?><img src="<?=ms::meta('img_url').ms::meta('banner_2')?>"><?}?>
		</td>
	</tr>
</table>
<div>
<?php
	/** display 5 posts from each forum that is selected by the user on Config_Global */
	if ( ms::meta('forum_no_1') == '' ) ms::meta('forum_no_1', ms::board_id(etc::domain()).'_1');
	for ( $i = 1; $i <= 10; $i++ ) {
		if ( ms::meta('forum_no_'.$i) != '' ) {
			$option = db::row( "SELECT bo_subject, bo_count_write FROM $g5[board_table] WHERE bo_table='".ms::meta('forum_no_'.$i)."'" );
			echo latest( "x-latest-community" , ms::meta('forum_no_'.$i) , 5 , 25 );
		}
	}
?>
</div>


