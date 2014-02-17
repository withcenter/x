<?php
	
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
	
	if ( empty($wr_subject) ) $wr_subject = "No subject";
	if ( empty($wr_content) ) $wr_content = "No content";
	
	
	
	
	$subject = $wr_subject;
	$content = $files.$images.$wr_content;
	$url = g::url();
	$copyright	= "To know more aobut ... visit : <a href='$url' target='_blank'>$url</a>";
	$content	= "
		$copyright
		<img src='....'>
		<p>$content</p>
		$copyright
	";
	if ( $mode == 'edit' ) {
		dlog("Blog push updating begins");
		$blog_no = x::config( "$bo_table.$wr_id");
	}
	
	


	
	
	echo "STEP 0..\n";
	$response = push_to_blog(
		array(
			'endpoint'	=> $blogs['naver']['endpoint'],
			'id'		=> $blogs['naver']['id'],
			'password'	=> $blogs['naver']['password'],
			'subject'	=> $subject,
			'description'	=> $content,
			'mode'		=> $mode,
			'blog_no'	=> $blog_no
		)
	);
	
	
	if ( $response->faultCode() ) {
		$str = $response->faultString();
		$str = str_replace("&lt;", "<", $str);
		$str = str_replace("&gt;", ">", $str);
		
		echo $str;
		dlog ( $str );
		
	}
	else {
		$blog_no = $response->value()->scalarval();
		
		if ( $blog_no == '1' ) return;			/// result from editPost();
		
		dlog("blog_no: $blog_no");
		if ( etc::cli() ) {
		}
		else {
			x::config( "$bo_table.$wr_id", $blog_no );
		}
		
	}
	
function push_to_blog( $o )
{

	dlog("push_to_blog( $o ):");
	dlog($o);
	
	
	$endpoint	= $o['endpoint'];
	$id			= $o['id'];
	$password	= $o['password'];
	$subject	= $o['subject'];
	$description	=  $o['description'];
	$mode		= $o['mode'];
	$blog_no	= $o['blog_no'];
	
	
	$publish = true;
	echo "STEP 1..: $endpoint\n";
	$client = new xmlrpc_client($endpoint);
	//$client->setDebug(1);
	echo "STEP 2..\n";
	$client->setSSLVerifyPeer(false);
	$GLOBALS['xmlrpc_internalencoding']='UTF-8';
	
	$struct = array(
		'title' => new xmlrpcval($title, "string"), 
		'description' => new xmlrpcval($description, "string"),		
	);
	$blog_id = $id;
	echo "STEP 3..\n";

	if( $mode == 'write' ) {
		$f = new xmlrpcmsg("metaWeblog.newPost",
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
		$f = new xmlrpcmsg("metaWeblog.editPost",
			array(			
				new xmlrpcval($blog_no, "string"),
				new xmlrpcval($id, "string"),
				new xmlrpcval($password, "string"),
				new xmlrpcval($struct , "struct"), 
				new xmlrpcval($publish, "boolean"),			
			)
		);
	}
	
	$f->request_charset_encoding = 'UTF-8';
	
	echo "Sending..\n";
	$response = $client->send($f);
	return $response;
}
