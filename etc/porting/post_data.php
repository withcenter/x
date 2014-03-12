<?php

error_reporting(E_ALL ^ E_NOTICE);

define('_INDEX_', true);
include_once('../common.php');




echo "Converting Post Data...\n";
$sql = "SELECT bo_table FROM $g5[board_table]";
$rows = db::rows($sql);


$sql = "SELECT * FROM x_multisite_config";
$sites = db::rows($sql);

foreach ( $sites as $site ) {
	$bo_table = $row['bo_table'];
	
	$forums = x::forum_ids( $site['domain'] );
	
	foreach ( $forums as $forum ) {
		echo "$site[domain] : $forum\n";
		$posts = db::rows("SELECT * FROM ".bo_table_name($forum)." WHERE wr_is_comment=0");
		if ( $posts ) {
			foreach ( $posts as $p ) {
				$content = strip_tags($p['wr_content']);
				$o = array(
					'domain'					=> $site['domain'],
					'bo_table'					=> $forum,
					'wr_id'						=> $p['wr_id'],
					'ca_name'					=> $p['ca_name'],
					'wr_subject'				=> addslashes($p['wr_subject']),
					'wr_content'				=> addslashes($content),
					'mb_id'						=> $p['mb_id'],
					'wr_name'					=> $p['wr_name'],
					'wr_datetime'				=> G5_TIME_YMDHIS
				);
				x::post_data_insert($o);
			}
		}
	}
	
	
	
	
	
	
}



echo "-- FINISHED --\n";

