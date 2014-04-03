<?php
	set_time_limit( 600 );
	if ( empty($dir) || empty($name) || empty($type) ) json_exit ( array('code'=>'-2', 'message'=>"Wrong input. one of following variable is not provided: dir, name, type.") );



	$path_target = "$dir/$type/$name";


	include x::dir() . '/class/ssh.php';
	$re = ssh::command( $host, $id, $password, "rm -rf $path_target" );
	if ( is_array( $re ) ) {
		if ( empty($re[1]) ) {
			$re = ssh::SUCCESS;
			$message = "success";
		}
	}
	else {
		switch ( $re ) {
			case ssh::SUCCESS		: $message="sucess"; break;
			case ssh::CONNECTION_FAILED	: $message="Connection failed. Please check the host (or IP)"; break;
			case ssh::LOGIN_FAILED		: $message="Login failed. Please check the ID and Password"; break;
		}
	}

	json_exit( array( 'code' => $re, 'message' => $message ) );


function json_exit( $json )
{
	global $in;
	$json = json_encode($json);
	echo "$in[callback]($json)";
}

