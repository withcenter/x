<?php
//FTP file/directory upload/transfer
include_once('phpseclib/Net/SFTP.php');

$sftp = new Net_SFTP($host);
if ( !$sftp->login ( $id, $password ) ) {
	exit ( 'Login Failed' );
}

// recursive delete
$sftp->delete($dir, true);
