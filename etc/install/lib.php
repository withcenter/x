<?php

function url_language( $lang )
{
	return "x/etc/install/language.php?lang=$lang&return_url=".urlencode($_SERVER["PHP_SELF"]);
}

function install_language()
{
	$code = $_COOKIE['lang'];
	if ( $code ) return $code;
	else return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}

function ln($en, $ko=null)
{
	$ln = install_language();
	if ( $ln == 'en' ) return $en;
	else {
		if ( $ko ) return $ko;
		else return $en;
	}
}

