<?php
for ( $cb = 1; $cb <= 3; $cb++ ) {
		$api_end_point = ms::meta('api-end-point'.$cb);
		$api_username = ms::meta('api-username'.$cb);
		$api_password = ms::meta('api-password'.$cb);
		
		if ( empty($api_end_point) || empty($api_username) || empty($api_password) ) continue;
		
		dlog("including push_to_blog.php ...");


	if ( php_sapi_name() == 'cli' ) { /// debugging
		error_reporting( E_ALL ^ E_NOTICE );
		include 'etc/x-standalone.php';
		while (@ob_end_flush());
		$blogs['naver'] = array(
			'endpoint'	=> "https://api.blog.naver.com/xmlrpc",
			'id'		=> "drrr2222",
			'password'	=> "286fb66fe6b911dfcbb8bd8a32a40a61"
		);
	}
	else {
		if ( $api_end_point && $api_username && $api_password ) {
			$blogs['naver'] = array(
				'endpoint'	=> $api_end_point,
				'id'		=> $api_username,
				'password'	=> $api_password
			);
		}
		else return;
	
	}
	dlog("push_to_blog.php begins");
	
	
	
	include_once x::dir() . '/etc/xmlrpc/xmlrpc-3.0b/lib/xmlrpc.inc';
	
	
	
	global $wr_subject, $wr_content;
	dlog ( $wr_subject );
	
	if ( empty($wr_subject) ) $wr_subject = "No subject";
	if ( empty($wr_content) ) $wr_content = "No content";
	
	
	
	
	$subject = $wr_subject;
	$content = $wr_content;
	$url = g::url();
	$copyright	= "게시글 출처:  <a href='$url' target='_blank'>$url</a>";
	$content	= "
		$copyright
		<img src='....'>
		<p>$content</p>
		$copyright
	";
	if ( $mode == 'edit' ) {
		dlog("Blog push updating begins");
	}
	else $mode = 'write';
	

	
	
	echo "STEP 0..\n";

	$response = push_to_blog(
		array(
			'endpoint'	=> $blogs['naver']['endpoint'],
			'id'		=> $blogs['naver']['id'],
			'password'	=> $blogs['naver']['password'],
			'subject'	=> $subject,
			'description'	=> $content,
			'mode'		=> $mode,
			'blog_no'	=> x::config( "$bo_table.$wr_id.$cb")
		)
		, $cb
	);
	
	
	if ( $response->faultCode() ) {
		$str = $response->faultString();
		$str = str_replace("&lt;", "<", $str);
		$str = str_replace("&gt;", ">", $str);
		
		echo $str;
		dlog ( $str );
		
	}
	else {
		$return_no = $response->value()->scalarval();
		
		if ( $return_no == '1' ) continue;			/// result from editPost();
		
		dlog("blog_no: ".$return_no);
		if ( etc::cli() ) {
		}
		else {
			x::config( "$bo_table.$wr_id.$cb", $return_no );
		}
		
	}
	
}

if ( !function_exists( 'push_to_blog' ) ) {
function push_to_blog( $o, $cb )
{
	
	$client = "client_".$cb;
	$f = "f_".$cb;

	dlog("push_to_blog( $o ):");
	dlog($o);
	
	
	$endpoint	= $o['endpoint'];
	$id			= $o['id'];
	$password	= $o['password'];
	$subject	= $o['subject'];
	$description	=  $o['description'];
	$mode		= $o['mode'];
	$blog_no[$cb]	= $o['blog_no'];
	
	dlog ( $blog_no[$cb] );
	
	$publish = true;
	echo "STEP 1..: $endpoint\n";
	$$client = new xmlrpc_client($endpoint);
	//$client->setDebug(1);
	echo "STEP 2..\n";
	$$client->setSSLVerifyPeer(false);
	$GLOBALS['xmlrpc_internalencoding']='UTF-8';
	
	$struct = array(
		'title' => new xmlrpcval($subject, "string"), 
		'description' => new xmlrpcval(stripslashes($description), "string"),
	);
	$blog_id = $id;
	echo "STEP 3..\n";

	if( $mode == 'write' ) {
		$$f = new xmlrpcmsg("metaWeblog.newPost",
			array(						
				new xmlrpcval($blog_id, "string"),
				new xmlrpcval($id, "string"),
				new xmlrpcval($password, "string"),
				new xmlrpcval($struct , "struct"), 
				new xmlrpcval($publish, "boolean"),			
			)
		);
	}
	else if( $mode == 'edit' ) {
		$$f = new xmlrpcmsg("metaWeblog.editPost",
			array(			
				new xmlrpcval($blog_no[$cb], "string"),
				new xmlrpcval($id, "string"),
				new xmlrpcval($password, "string"),
				new xmlrpcval($struct , "struct"), 
				new xmlrpcval($publish, "boolean"),			
			)
		);
	}
	
	$$f->request_charset_encoding = 'UTF-8';
	
	echo "Sending..\n";
	$response = $$client->send($$f);
	return $response;
}
}
