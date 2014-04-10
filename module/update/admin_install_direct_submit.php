<?php
	
	if ( empty($type) ) {
		echo "<div class='erorr'>No type</div>";
		return;
	}
	

	include "menu.php";
	
	$a = explode('/', $source_link);
	$name = $a[ count($a) - 1 ];
	
	$dir_type		= x::dir() . '/' . $type;
	$dir_project 	= $dir_type .'/'. $name;
	$dir_tmp		= $dir_project . '-tmp';
	
	$pu = parse_url( $source_link );
	$git_zip_host_url = "https://codeload.github.com";
	$url_download = "$git_zip_host_url$pu[path]/zip/master";
	
	$path_zip = "$dir_type/$name.zip";
	
	
	
	echo "<div class='message'>Begin</div>";
	echo "<div class='message'>Downloading theme from github : $url_download</div>";
	
	$content = file::download( $url_download );
	
	
	@$re = file::write( $path_zip, $content );
	if ( $re ) {
		echo "ERROR: failed to write zip file.";
		return;
	}
	echo "<div class='message'>Downloading complete.</div>";
	
	
	$zip = new ZipArchive;
	if ($zip->open($path_zip) == TRUE) {
		$zip->extractTo($dir_tmp);
		$zip->close();
	}
	echo "<div class='message'>Unzip complete.</div>";

	file::delete_folder( $dir_project );
	rename ( "$dir_tmp/$name-master", $dir_project );

	
	
	unlink( $path_zip );
	rmdir( $dir_tmp );
	
	echo "<div>SUCCESS - INSTALLED</div>";
	