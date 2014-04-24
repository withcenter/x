<?php
/**
 *  @brief load default language pack.
 *  
 *  @return empty
 *  
 *  @details if user language is not en, then load user language pack.
 *  @refer x buildguide#language
 *  [ko] https://docs.google.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/edit#heading=h.40q8kd9nkupl
 *  [en] https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.ldxgqjhlusxc
 *  
 */

/// default language : x/etc/language
$_language_folder = x::dir() . "/etc/language";
include 'load_language_code.php';

/// module language
if ( $module ) {
	$_language_folder = x::dir() . "/module/$module/language";
	include 'load_language_code.php';
}


/// theme language

	$_language_folder = x::dir() . '/theme/' . x::$config['site']['theme'] . '/language';
	include 'load_language_code.php';
	