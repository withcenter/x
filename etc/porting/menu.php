<?php

error_reporting(E_ALL ^ E_NOTICE);

define('_INDEX_', true);
include_once('../common.php');



echo "Converting Menu...\n";
$sql = "SELECT * FROM x_multisite_config";
$sites = db::rows($sql);
foreach ( $sites as $site ) {
	for( $i=1; $i<=10; $i++ ) {
		$v = x::meta_get( $site['domain'], "menu_$i" );
		x::meta_set( $site['domain'], "menu{$i}bo_table", $v );
	}
}

echo "-- FINISHED --\n";

