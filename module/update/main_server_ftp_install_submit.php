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


if ( is_dir ( $dir . '/theme/'.$project_name ) ) file::delete_folder ( $dir . '/theme/'.$project_name );


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
	$pathinfo = pathinfo ( $filename );
	echo "<br>$filename - save to: ".$sftp->pwd()."/".$pathinfo['filename'];
	
	
	$sftp->put( $pathinfo['filename'], $filename, NET_SFTP_LOCAL_FILE);
	$sftp->chmod(0755, $pathinfo['filename'] );
}

