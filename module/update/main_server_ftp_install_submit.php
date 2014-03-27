<?php
$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";

$data_path = G5_PATH.'/data/tmp/';
$theme_file_path = $data_path.$project_name.'.zip';

// file download and save to data/tmp
$theme_file = file_get_contents($url);
file_put_contents($theme_file_path, $theme_file);

// extract
$zip = new ZipArchive;
if ($zip->open($theme_file_path) == TRUE) {
	$zip->extractTo($data_path);
	$zip->close();
	echo 'File Extracted';
} else echo 'File Extraction Failed';


// rename and then delete the zip file
rename( $data_path.$project_name.'-master', $data_path.$project_name );
unlink ( $theme_file_path );


//FTP file/directory upload/transfer
include('phpseclib/NET/SFTP.php');
include_once('phpseclib/Math/BigInteger.php');
include_once('phpseclib/Crypt/Random.php');
include_once('phpseclib/Crypt/Hash.php');


$sftp = new Net_SFTP($host);
if (!$sftp->login($id, $password)) {
    exit('Login Failed');
}
foreach (glob($data_path.$project_name."/*.*") as $filename) $sftp->put($filename, $dir.$project_name, NET_SFTP_LOCAL_FILE);

	
/** sample

CODE 1: (Binary Safe based on php.net ) file_get_contents, http://ca2.php.net/file_get_contents
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
 
// download $url and save it into a file(templorary folder like G5/data folder or /tmp foder) or variable.


// unzip it and correct the folder name if ncessary (rename it to the project name)


// upload the master folder  using phpseclib

*/



