<?php
	include 'class.update.php';
	include 'dist-menu.php';
?>

<?php

	if ( $mode == 'delete' ) {
		if ( super_admin() ) {
		}
		else {
			$row = x::data_get( $idx );
			if ( $row['id'] != my('id') ) {
				jsGo("?module=$module&action=$action", "This is not your source.");
				return;
			}
		}
		x::data_delete( $idx );
		jsGo("?module=$module&action=$action", "The source has been deleted.");
		return;
	}
	
	$o = array( 'first' => 'source' );
	if ( super_admin() ) {
	}
	else {
		$o['id']		= my('id');
	}
	
	
	$rows = x::data_gets( $o );
	
	
	$ln_delete = lang("DELETE");
	
	echo "<table width='100%'>";
	echo "<tr><td>Widget Name</td><td>ID</td><td>$ln_delete</td></tr>";
	foreach( $rows as $row ) {
		$name = string::unscalar( $row[ up::name ] );
		$url_delete = "?module=$module&action=$action&mode=delete&idx=$row[idx]";
		echo "
			<tr>
				<td>{$name[L]}</td>
				<td>$row[third]</td>
				<td><a href='$url_delete'>$ln_delete</a></td>
			</tr>
		";
	}
	echo "</table>";
	