<?php
	set_time_limit( 600 );
	if ( empty($dir) || empty($type) || empty($source_link) ) json_exit ( array('code'=>'-2', 'message'=>"Wrong input. one of following variable is not provided: path, type, source_link.") );


	$pu = parse_url( urldecode($source_link) );
	$a = explode('/', $pu['path']);
	$name = $a[ count($a) - 1 ];

	$url_git_code_server	= "https://codeload.github.com";
	$url_download		= "$url_git_code_server$pu[path]/zip/master";
	$path_tmp		= g::dir() . '/data/tmp';
	$path_tmp_project	= $path_tmp. '/' . $name;
	$path_tmp_zip		= "$path_tmp_project.zip";

	//di("step 0 : $path_tmp_project"); exit;

	if ( is_dir( $path_tmp_project ) ) file::delete_folder( $path_tmp_project );

	//di("step 1"); exit;

	$path_target = "$dir/$type/$name";
	$content = file::download( $url_download );
	//di("step 2");

	@$re = file::write( $path_tmp_zip, $content );
	if ( $re ) json_exit ( array('code'=>'-1', 'message'=>"Error on writing zip file to : $path_tmp_zip") );
	
	//di("step 3");

	
	$zip = new ZipArchive;
	if ($zip->open($path_tmp_zip) == TRUE) {
		$zip->extractTo($path_tmp_project);
		$zip->close();
	}
	//di("step 4");



	include x::dir() . '/class/ssh.php';
//	di( "ssh::copy( $host, $id, $password, $path_tmp_project/$name-master, $path_target );");
	$re = ssh::copy( $host, $id, $password, "$path_tmp_project/$name-master", $path_target );
	switch ( $re ) {
		case ssh::SUCCESS		: $message="sucess"; break;
		case ssh::CONNECTION_FAILED	: $message="Connection failed. Please check if the host (or IP) correct and if it can be connected. Be sure the host is not under firewall."; break;
		case ssh::LOGIN_FAILED		: $message="Login failed. Please check the ID and Password"; break;
		case ssh::SEND_FAILED		: $message="send_failed"; break;
		case ssh::SOURCE_NOT_FOUND	: $message="source file or directory not found"; break;
		case ssh::FOLDER_CREATE_FAILED	: $message="fail on creating directory."; break;
	}

	json_exit( array( 'code' => $re, 'message' => $message ) );


function json_exit( $json )
{
	global $in;
	$json = json_encode($json);
	echo "$in[callback]($json)";
}

