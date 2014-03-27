<?php


$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";


$file = file_get_contents($url);
$data_path = G5_PATH.'/data/tmp/';

// file download and save to data/tmp
$file_path = $data_path.$project_name.'.zip';
file_put_contents($file_path, $file);

// extract
$zip = new ZipArchive;
if ($zip->open($file_path) == TRUE) {
	$zip->extractTo($data_path);
	$zip->close();
	echo 'File Extracted';
} else {
	echo 'File Extraction Failed';
}

// rename
rename( $data_path.$project_name.'-master', $data_path.$project_name );

// delete
unlink ( $file_path );

	
/** sample

	$file = file_get_contents($url);
	$data_path = G5_PATH.'/data/tmp/';
	$file_path = $data_path.$project_name.'.zip';
	file_put_contents($file_path, $file);

	
	$zip = new ZipArchive;
	if ($zip->open($file_path) == TRUE) {
		$zip->extractTo($data_path);
		$zip->close();
		echo 'File Extracted';
	} else {
		echo 'File Extraction Failed';
	}

	rename( $data_path.$project_name.'-master', $data_path.$project_name );
	
	unlink ( $file_path );
 
	
http://ca2.php.net/file_get_contents

// download $url and save it into a file(templorary folder like G5/data folder or /tmp foder) or variable.


// unzip it and correct the folder name if ncessary (rename it to the project name)


// upload the master folder  using phpseclib

*/



