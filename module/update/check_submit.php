<?php

	include x::dir() . '/etc/version.php';
	list( $year, $month, $day, $count ) = explode('.', $version );
	$version_server = mktime( 0, 0, 0, $month, $day, $year );
	
	
	list( $year, $month, $day, $count ) = explode('.', $in['version'] );
	$version_client = mktime( 0, 0, 0, $month, $day, $year );
	
	
	if ( $version_server > $version_client ) {
		echo "
			$version_message
			<script>
				parent.postMessage( 'update', '*' );
			</script>
		";
	}
	else {
		echo "
			$version_message
			<script>
				parent.postMessage( 'none', '*' );
			</script>
		";
	}
	

	