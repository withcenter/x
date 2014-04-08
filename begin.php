<?php
include 'etc/library.php';
include_once 'etc/class.php';
if ( 0 || etc::test_server() ) debug::mode(1);											$dt = date("H:i:s"); dlog("x begins at $dt\t[module=$module][action=$action]\t : $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]\t{{");


include_once 'etc/firewall.php';
include_once 'etc/service.php';
include_once 'etc/language/default.php';


if ( etc::web() ) x::load_global_config();


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



