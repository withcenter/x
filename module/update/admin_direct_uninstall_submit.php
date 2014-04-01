<?php

	if ( $type == 'theme' ) {
		$folder	= x::dir() . '/theme/'. $name;
	}
	
	
	file::delete_folder ( $folder );
	
	
	echo "UN-INSTALLED";
	