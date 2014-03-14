<?php
include_once 'etc/class.php';
include_once 'etc/procedural-function.php';


if ( etc::web() ) x::load_global_config();


if ( etc::test_server() ) debug::mode(1);
									$dt = date("H:i:s"); dlog("x begins at $dt\t[module=$module][action=$action]\t : $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]\t{{");
include_once 'etc/service.php';
include_once 'etc/language/default.php';


if ( x::installed() && etc::web() ) {
	//x::$config['site'] = md::config( etc::domain_name() );
	x::load_site();
	ob_start();
}

include 'etc/begin.php';
if ( etc::web() ) x::set_title();
if ( etc::web() ) x::hook('begin');


x::hook('before_theme_init');
if ( file_exists(x::theme('init')) ) include_once x::theme('init');	
x::hook('after_theme_init');

/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.bqguddm7sk01
if ( $in['theme'] == 'y' ) {
}
else if ( $in['theme'] == 'n' || preg_match("/_submit$/", $action) ) {
	include "module/$module/$action.php";
	include 'end.php';
	exit;
}



