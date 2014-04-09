<?php

	include "menu.php";

	if ( empty($type) || empty($name) ) {
		echo "ERROR: check type and name";
		exit;
	}
	

	
	$folder	= x::dir() . "/$type/$name";
	
	
	file::delete_folder ( $folder );
	
	
	echo "<div class='notice'>UN-INSTALLED</div>";
	