<?php
	echo "DEPRECATED";
	exit;
?>
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

$re = ssh::copy ( $host, $id, $password, $data_path.$project_name, $dir.'/theme/'.$project_name );
if ( $re == ssh::CONNECTION_FAILED ) {
	echo "Connection failed. Please check the host : $host";
}
else if ( $re == ssh::LOGIN_FAILED ) {
	echo "Login failed. Please check the ID and Password";
}

echo $re;
