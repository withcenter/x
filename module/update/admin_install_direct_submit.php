<?php

	include "menu.php";
	
	$a = explode('/', $source_link);
	$pname = $a[ count($a) - 1 ];
	
	$dir_theme	= x::dir() . '/theme';
	$dir_project 	= $dir_theme .'/'. $pname;
	$dir_tmp		= $dir_project . '-tmp';
	
	$pu = parse_url( $source_link );
	$git_zip_host_url = "https://codeload.github.com";
	$url_download = "$git_zip_host_url$pu[path]/zip/master";
	
	$path_zip = "$dir_theme/$pname.zip";
	
	
	
	echo "<div class='message'>Downloading theme from github : $url_download</div>";
	flush();
	$content = file::download( $url_download );
	
	
	@$re = file::write( $path_zip, $content );
	if ( $re ) {
		echo "ERROR: failed to write zip file.";
		return;
	}
	
	$zip = new ZipArchive;
	if ($zip->open($path_zip) == TRUE) {
		$zip->extractTo($dir_tmp);
		$zip->close();
	}

	file::delete_folder( $dir_project );
	rename ( "$dir_tmp/$pname-master", $dir_project );

	
	
	unlink( $path_zip );
	rmdir( $dir_tmp );
	
	echo "<div>INSTALLED</div>";