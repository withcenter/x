<?php

error_reporting(E_ALL ^ E_NOTICE);

define('_INDEX_', true);
include_once('../common.php');


db::query("TRUNCATE TABLE `x_site_config` ");

echo "Converting Site...\n";




$sites = db::rows( "SELECT * FROM x_multidomain_config" );
foreach ( $sites as $site ) {
	$up['domain']					= $site['domain'];
	$up['stamp_created']		= time();
	
	if ( x::site( $site['domain'] ) ) x::site_delete( $site['domain'] );
	
	
	
	db::insert('x_site_config', $up);
}




$sites = db::rows( "SELECT * FROM x_multisite_config" );
foreach ( $sites as $site ) {
	$up['domain']					= $site['domain'];
	$up['stamp_created']		= $site['stamp_create'];
	$up['mb_id']					= $site['mb_id'];
	if ( x::site( $site['domain'] ) ) x::site_delete( $site['domain'] );
	db::insert('x_site_config', $up);
	x::meta( $site['domain'], 'title', $site['title'] );
}


echo "-- FINISHED --\n";

