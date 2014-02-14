<?php
define('_INDEX_', true);
include_once('../common.php');
include_once(G5_PATH.'/head.php');
if ( preg_match('/^admin_/', $action) ) include x::admin_menu();
if ( ! empty( $module ) ) {
	include module( 'init' );
	include module( $action );
}
else {
	echo "module is empty. GO TO Admin Page <a href='?module=admin&action=index'>ADMIN Page</a><br>";
	//include "xml_sample/demo/client.php";
	//include "etc/test/post.php";
}
include_once(G5_PATH.'/tail.php');
?>