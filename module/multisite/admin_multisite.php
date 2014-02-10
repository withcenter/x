<?php
	echo "
		<h2><a href='?module=multisite&action=create'>Add New Site</a></h2>
	";
	
	
	$sites = ms::gets();
	
	echo '<table cellspacing=3px>';
	echo "
		<tr>
			<td></td>
			<td><h2>DOMAIN</h2></td>
			<td><h2>USER ID</h2></td>
			<td><h2>TITLE</h2></td>
			<td><h2>HEADER</h2></td>
			<td><h2>FOOTER</h2></td>
			<td><h2>PRIORITY</h2></td>
		</tr>
	";
	foreach ( $sites as $site ) {
		echo '<tr>';
			echo "<td><a href='?module=multisite&action=admin_update&idx=$site[idx]'>Edit =></a></td>";
			echo "<td><a href='http://$site[domain]'>$site[domain]</a></td>";
			echo "<td>$site[mb_id]</td>";
			echo "<td>$site[title]</td>";
			if ( !empty($site['header']) ) $header = 'O';
			else $header = 'X';
			echo "<td>$header</td>";
			
			if ( !empty($site['footer']) ) $footer = 'O';
			else $footer = 'X';
			echo "<td>$footer</td>";
			
			echo "<td>$site[priority]</td>";
			

		echo '</tr>';
	}
	echo '</table>';
	