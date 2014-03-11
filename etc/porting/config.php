<?php

error_reporting(E_ALL ^ E_NOTICE);

define('_INDEX_', true);
include_once('../common.php');

$dir_root = G5_PATH;

if ( db::key_exist( 'x_config', "key_code" ) ) {
}
else {
	db::query("DROP INDEX `PRIMARY` on x_config");
	db::query("ALTER TABLE x_config ADD `key` varchar(64) NOT NULL DEFAULT ''");
	db::query("CREATE UNIQUE INDEX `key_code` ON x_config (`key`,`code`)");
	db::query("CREATE INDEX `code` on x_config(`code`)");
}



$rows = db::rows("SELECT * FROM x_multisite_meta");
foreach ( $rows as $row ) {
	x::meta_set( $row['domain'], $row['code'], $row['value'] );
}
echo "-- FINISHED --";

