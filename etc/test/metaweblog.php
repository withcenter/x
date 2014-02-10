<?php
	error_reporting( E_ALL ^ E_NOTICE );
	include 'etc/x-standalone.php';
	while (@ob_end_flush());
	
	
	
	$file = g::dir() . "/data/metaweblog_" . $argv[1];
	$HTTP_RAW_POST_DATA = file::read( $file );
	
	include g::dir().'/x/etc/service/metaweblog.php';
	