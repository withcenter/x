<?php
	if ( php_sapi_name() == 'cli' ) {
		error_reporting( E_ALL ^ E_NOTICE );
		include 'etc/x-standalone.php';
		while (@ob_end_flush());
	}
	include_once x::dir() . '/etc/xmlrpc/xmlrpc-3.0b/lib/xmlrpc.inc';
	
	$blogs['naver'] = array(
		'endpoint'	=> "https://api.blog.naver.com/xmlrpc",
		'id'		=> "thruthesky",
		'password'	=> "224ff2eb4930d4498b36ca25cbdc8f56"
	);
	
	$content = "This is test writing";
	$subject = "SUBJECT: This is test writing";
	$copyright	= "To know more aobut ... visit : " . g::url();
	$content	= "$copyright<p>$content</p>$copyright";
	
	echo "STEP 0..\n";
	$response = push_to_blog( $blogs['naver']['endpoint'], $blogs['naver']['id'], $blogs['naver']['password'], $subject, $content );
	if ( $response->faultCode() ) {
		echo $response->faultString();
	}
	else echo "SUCCESS\n";

function push_to_blog( $endpoint, $id, $password, $subject, $description )
{
	$publish = true;
	echo "STEP 1..: $endpoint\n";
	$client = new xmlrpc_client($endpoint);
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
			new xmlrpcval($blogid, "string"),
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

