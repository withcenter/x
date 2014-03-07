<?php
	
	/** display 3 posts from each forum that is selected by the user on Config_Global */
	if ( ms::meta('forum_no_1') ) include_once 'blog_main.php';
?>
<table cellpadding=0 cellspacing=0 width='100%'>
	<tr valign='top'>
		<td>
			<?php
				for ( $i = 2; $i <= 10; $i++ ) {
					if ( ms::meta('forum_no_'.$i) ) {
						$option = db::row( "SELECT bo_subject, bo_count_write FROM $g5[board_table] WHERE bo_table='".ms::meta('forum_no_'.$i)."'" );
						echo latest( "x-latest-blog" , ms::meta('forum_no_'.$i) , 3 , 25 );
					}
				}
			?>
		</td>
		<td width=10></td>
		<td width=180>
		</td>
	</tr>
</table>

	