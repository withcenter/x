<?php
	echo "
		<a class='add-new-site' style='color: #ffffff;' href='?module=multisite&action=create'>Add New Site</a>
		
		<div style='clear:right;'></div>
	";
	
	
	$sites = ms::gets();
	
	echo "<table cellspacing=0 cellpadding=0 width='100%' class='admin-multisite-table'>";
	echo "
		<tr valign='top' class='header'>
			<td></td>
			<td>Domain</td>
			<td>Owner</td>
			<td>Site Name</td>
			<td align='center'>Status</td>
			<td align='center'>No. Forum</td>
			<td align='center'>No. Post</td>
		</tr>
	";
	$i = 0;
	foreach ( $sites as $site ) {
		if ( $i % 2 == 1 ) $background="background";
		else $background = null;
		$i++;
		
		echo "<tr class='row $background'>";
			echo "<td><div class='jbutton-group'><a class='jbutton orange edit' href='?module=multisite&action=admin_update&idx=$site[idx]'>Edit</a></div></td>";
			echo "<td><a href='http://$site[domain]'>$site[domain]</a></td>";
			echo "<td>$site[mb_id]</td>";
			echo "<td><span class='site-title'>$site[title]</span></td>";
			
			
			
			
			
			echo "<td align='center'>".ms::meta_get($site['domain'], 'status')."</td>";
			
			
			
			echo "<td align='center'>".ms::count_forum($site['domain'])."</td>";
			
			echo "<td align='center'>".ms::count_post(ms::forum_ids( $site['domain'] ), null )."</td>";
			

		echo '</tr>';
	}
	echo '</table>';
	