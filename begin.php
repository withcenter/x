<?php
include_once 'etc/class.php';
if ( etc::test_server() ) debug::mode(1);

									$dt = date("H:i:s"); dlog("x begins at $dt\t[module=$module][action=$action]\t : $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]\t{{");
									
include_once 'etc/service.php';
include_once 'etc/language/default.php';
ms::set_title();



if ( x::installed() && ! etc::cli() ) {
	x::$config['site'] = md::config( etc::domain_name() );
	include_once x::theme('init');
	ob_start();
}

include 'etc/begin.php';

