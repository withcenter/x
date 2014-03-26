<?php
define('NET_SSH2_LOGGING', 2);


set_include_path( x::dir() . '/module/update/phpseclib');

// include('Net/SSH2.php');


include('Net/SFTP.php');

$sftp = new Net_SFTP($host);
if (!$sftp->login($id, $password)) {
echo "sftp->login failed()...<br>";
	echo $sftp->getLog();
    exit('Login Failed');
}



//$sftp->delete('filename.remote'); // doesn't delete directories


// recursive delete
$sftp->delete($dir, true); // deletes a directory and all its contents


// $sftp->rename('filename.remote', 'newname.remote');

echo "finished";
