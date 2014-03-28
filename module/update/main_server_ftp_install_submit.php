<?php
$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";

$data_path = G5_PATH.'/data/tmp/';
if ( is_dir ( $data_path.$project_name ) ) file::delete_folder ( $data_path.$project_name );

$theme_file_path = $data_path.$project_name.'.zip';

// file download and save to data/tmp, read remote file
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
}


// rename and then delete the zip file
rename( $data_path.$project_name.'-master', $data_path.$project_name );
unlink ( $theme_file_path );


//FTP file/directory upload/transfer
include_once('phpseclib/Net/SFTP.php');

define('NET_SFTP_LOGGING', NET_SFTP_LOG_COMPLEX); // or NET_SFTP_LOG_SIMPLE

$sftp = new Net_SFTP('workserver.org');
if ( !$sftp->login('g5x4', 'ontue0458934377') ) {
	echo "error:<br>";
	$arr = $sftp->getSFTPErrors() ;
	di($arr);
	exit;
}

print_r($sftp->nlist());
$arr = $sftp->getSFTPLog();
di($arr);

exit;


define('NET_SSH2_LOGGING', NET_SSH2_LOG_SIMPLE);

$sftp = new Net_SFTP($host);
if ( !$sftp->login ( $id, $password ) ) {
	//jsBack( 'Login Failed' );
	$arr = $sft->getSFTPLog();
	di($arr);
	echo "log: $log";
	exit;
}

$sftp->chdir( $dir.'/theme');
if ( !is_dir ( $project_name ) ) $sftp->mkdir( $project_name );
$sftp->chdir( $project_name );

foreach (glob($data_path.$project_name."/*.*") as $filename) {
	$pathinfo = pathinfo ( $filename );
	if ( file_exists ( $file_path = $dir . '/theme/'.$project_name.'/'.$pathinfo['basename'] ) ) @unlink ( $file_path );
	$sftp->put( $pathinfo['basename'], $filename, NET_SFTP_LOCAL_FILE);
	$sftp->chmod(0755, $pathinfo['basename'] );
}

jsBack('Theme Installed Successfully');

