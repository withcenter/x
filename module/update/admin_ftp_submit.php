<?php










# server credentials
$host = $host;
$user = $id;
$pass = $password;

# connect to ftp server
$handle = @ftp_connect($host) or die("Could not connect to {$host}");
echo "connect ok<br>";

# login using credentials
@ftp_login($handle, $user, $pass) or die("Could not login to {$host}");
echo "login ok<br>";

function recursiveDelete($directory)
{
	global $handle;
	# here we attempt to delete the file/directory
	if ( !(@ftp_rmdir($handle, $directory) || @ftp_delete($handle, $directory)) ) {
		# if the attempt to delete fails, get the file listing
		$filelist = @ftp_nlist($handle, $directory);

		# loop through the file list and recursively delete the FILE in the list
		foreach($filelist as $file)
		{
		recursiveDelete($file);
		}

		#if the file list is empty, delete the DIRECTORY we passed
		recursiveDelete($directory);
	}
}
