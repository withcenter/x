<?php
$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";

$data_path = G5_PATH.'/data/tmp/';
if ( is_dir ( $data_path.$project_name ) ) file::delete_folder ( $data_path.$project_name );

$theme_file_path = $data_path.$project_name.'.zip';

// file download and save to data/tmp
//$theme_file = file_get_contents($url);
//file_put_contents($theme_file_path, $theme_file);
// read remote file
$file = fopen($url, 'rb');
$content = null;

while ( !feof ( $file ) ) {
	$content .= fread($file, 512);
}
fclose($file);


// write data from remote file
$file = fopen ( $theme_file_path, 'wb');
fwrite ( $file, $content );
fclose ( $file );



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
include_once('phpseclib/Net/SFTP.php');
/*
include_once('phpseclib/Math/BigInteger.php');
include_once('phpseclib/Crypt/Random.php');
include_once('phpseclib/Crypt/Hash.php');
*/


$sftp = new Net_SFTP($host);
if ( !$sftp->login ( $id, $password ) ) {
	exit ( 'Login Failed' );
}

echo $sftp->pwd();
$sftp->chdir( $dir.'/theme');
$sftp->mkdir( $project_name );
$sftp->chdir( $project_name );
echo $sftp->pwd();

foreach (glob($data_path.$project_name."/*.*") as $filename) {
	echo "<br>$filename - save to: ".$sftp->pwd();
	$sftp->put($filename, 'test', NET_SFTP_LOCAL_FILE);
}
	

/*
define('NET_SSH2_LOGGING', 2);
$sftp = new Net_SFTP($host);
di ( $in );
if ($sftp->login($id, $password)) {
	foreach (glob($data_path.$project_name."/*.*") as $filename) $sftp->put($filename, $dir.$project_name, NET_SFTP_LOCAL_FILE);
}
else {
	echo "<pre>";
	echo $sftp->getLog();
	echo "</pre>";
    exit('Login Failed');
}

*/
// download $url and save it into a file(templorary folder like G5/data folder or /tmp foder) or variable.


// unzip it and correct the folder name if ncessary (rename it to the project name)


// upload the master folder  using phpseclib




