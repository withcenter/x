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
			<td>DOMAIN</td>
			<td>USER ID</td>
			<td>TITLE</td>
			<td align='center'>HEADER</td>
			<td align='center'>FOOTER</td>
			<td align='center'>PRIORITY</td>
		</tr>
	";
	$i = 0;
	foreach ( $sites as $site ) {
		if ( $i % 2 == 1 ) $background="background";
		else $background = null;
		$i++;
		
		echo "<tr class='row $background'>";
			echo "<td><a href='?module=multisite&action=admin_update&idx=$site[idx]'>Edit =></a></td>";
			echo "<td><a href='http://$site[domain]'>$site[domain]</a></td>";
			echo "<td>$site[mb_id]</td>";
			echo "<td><span class='site-title'>$site[title]</span></td>";
			if ( !empty($site['header']) ) $header = 'O';
			else $header = 'X';
			echo "<td align='center'>$header</td>";
			
			if ( !empty($site['footer']) ) $footer = 'O';
			else $footer = 'X';
			echo "<td align='center'>$footer</td>";
			
			echo "<td align='center'>$site[priority]</td>";
			

		echo '</tr>';
	}
	echo '</table>';
	