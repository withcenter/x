<?php
include_once 'etc/class.php';
dlog("x begins\t----- : $_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]");



include_once 'etc/service.php';

include_once 'etc/language/default.php';
ms::set_title();
if ( x::installed() && ! etc::cli() ) {
	x::$config['site'] = md::config( etc::domain_name() );
	include_once x::theme('init');
	ob_start();
}

include 'etc/begin.php';
