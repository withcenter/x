<?php
//FTP file/directory upload/transfer
include_once('phpseclib/Net/SFTP.php');

$sftp = new Net_SFTP( $host );
if ( !$sftp->login ( $id, $password ) ) {
	echo "Login Failed: Please check FTP host, ID, Passwod.";
	exit;
}

// recursive delete
$sftp->delete($dir, true);
