<?php
	$dir_theme	= x::dir() . '/theme';
	$dir_project 	= $dir_theme .'/'. $pname;
	file::delete_folder ( $dir_project );
	
	
	echo "UN-INSTALLED";
	