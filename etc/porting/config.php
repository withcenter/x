<?php

error_reporting(E_ALL ^ E_NOTICE);


define('_INDEX_', true);
include_once('../common.php');

$dir_root = G5_PATH;



$rows = db::rows("SELECT * FROM x_multisite_meta");
foreach ( $rows as $row ) {
	x::meta_set( $row['domain'], $row['code'], $row['value'] );
}
echo "-- FINISHED --";

