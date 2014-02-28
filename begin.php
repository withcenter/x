<?php
include_once 'etc/class.php';
x::load_global_config();


if ( etc::test_server() ) debug::mode(1);
									$dt = date("H:i:s"); dlog("x begins at $dt\t[module=$module][action=$action]\t : $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]\t{{");
include_once 'etc/service.php';
include_once 'etc/language/default.php';

if ( admin_page() ) {
	
}
else {
	/**
	 * @bug check what if the site is not multisite? still it hsa to set title?
	 */
	ms::set_title();
}


if ( x::installed() && etc::web() ) {
	//x::$config['site'] = md::config( etc::domain_name() );
	x::load_site();
	ob_start();
	if ( file_exists(x::theme('init')) ) include_once x::theme('init');	
}

include 'etc/begin.php';

x::hook('begin');


/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.bqguddm7sk01
if ( $in['theme'] == 'y' ) {
}
else if ( $in['theme'] == 'n' || preg_match("/_submit$/", $action) ) {
	include "module/$module/$action.php";
	include 'end.php';
	exit;
}

