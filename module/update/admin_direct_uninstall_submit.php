<?php

	include "menu.php";

	if ( empty($type) || empty($name) ) {
		echo "ERROR: check type and name";
		exit;
	}
	

	if ( $type == 'theme' ) {
		$folder	= x::dir() . '/theme/'. $name;
	}
	
	
	file::delete_folder ( $folder );
	
	
	echo "<div class='notice'>UN-INSTALLED</div>";
	