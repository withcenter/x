<?php
	if ( php_sapi_name() == 'cli' ) {
		error_reporting( E_ALL ^ E_NOTICE );
		include 'etc/x-standalone.php';
		while (@ob_end_flush());
	}
	include_once x::dir() . '/etc/xmlrpc/xmlrpc-3.0b/lib/xmlrpc.inc';
	
	
	
	if ( $api_end_point && $api_username && $api_password ) {
		$blogs['naver'] = array(
			'endpoint'	=> $api_end_point,
			'id'		=> $api_username,
			'password'	=> $api_password
		);
	}
	else {
		$blogs['naver'] = array(
			'endpoint'	=> "https://api.blog.naver.com/xmlrpc",
			'id'		=> "drrr2222",
			'password'	=> "286fb66fe6b911dfcbb8bd8a32a40a61"
		);
	}
	global $wr_subject, $wr_content;
	
	$subject = $wr_subject;
	$content = $wr_content;
	$url = g::url();
	$copyright	= "To know more aobut ... visit : <a href='$url' target='_blank'>$url</a>";
	$content	= "
		$copyright
		<img src='....'>
		<p>$content</p>
		$copyright
	";

	echo "STEP 0..\n";
	$response = push_to_blog( $blogs['naver']['endpoint'], $blogs['naver']['id'], $blogs['naver']['password'], $subject, $content );
	
	if ( $response->faultCode() ) {
		echo $response->faultString();
		dlog ( $response->faultString() );
	}
	else {
		echo "SUCCESS\n"; 
		dlog("SUCCESS");
	}
	
function push_to_blog( $endpoint, $id, $password, $subject, $description )
{
	$publish = true;
	echo "STEP 1..: $endpoint\n";
	$client = new xmlrpc_client($endpoint);
	$client->setDebug(1);
	echo "STEP 2..\n";
	$client->setSSLVerifyPeer(false);
	$GLOBALS['xmlrpc_internalencoding']='UTF-8';
	
	$struct = array(
		'title' => new xmlrpcval($title, "string"), 
		'description' => new xmlrpcval($description, "string") 
	);
	$blog_id = $id;
	echo "STEP 3..\n";
	$f = new xmlrpcmsg("metaWeblog.newPost",
		array(
			new xmlrpcval($blog_id, "string"),
			new xmlrpcval($id, "string"),
			new xmlrpcval($password, "string"),
			new xmlrpcval($struct , "struct"), 
			new xmlrpcval($publish, "boolean")
		)
	);
	$f->request_charset_encoding = 'UTF-8';
	echo "Sending..\n";
	$response = $client->send($f);
	return $response;
}


