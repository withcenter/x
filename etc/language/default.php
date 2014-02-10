<?php
/**
 *  @brief load default language pack.
 *  
 *  @return empty
 *  
 *  @details if user language is not en, then load user language pack.
 *  @refer x buildguide#language
 *  https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.ldxgqjhlusxc
 *  
 */
include x::dir() . '/etc/language/en.php';
$ln = etc::user_language();
if ( $ln != 'en' ) {
	$path = x::dir() . "/etc/language/$ln.php";
	if ( file_exists( $path ) ) include $path;
}

