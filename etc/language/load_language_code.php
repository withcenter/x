<?php
	///
	$path = "$_language_folder/en.php";
	if ( file_exists( $path ) ) include $path;

	///
	$ln = etc::user_language();
	if ( $ln != 'en' ) {
		$path = "$_language_folder/$ln.php";
		if ( file_exists( $path ) ) include $path;
	}