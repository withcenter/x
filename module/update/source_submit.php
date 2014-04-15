<?php

	include 'dist-menu.php';
	include module('config.source.php');
	

	$file = $_FILES['config'];
	
	try {
		@$xml = load_xml( $file['tmp_name'] );
	}
	catch ( Exception $e ) {
		echo "Eorror : " . $e->getMessage();
		return;
	}
	
	
	
	if ( empty( $xml['type'] ) ) {
		return _error( "No type ?" );
	}
	else if ( ! in_array($xml['type'], array('theme', 'widget', 'module') ) ) {
		return _error( "type must be one of theme, widget or module" );
	}
	
	// widget type check
	if ( $xml['type'] == 'widget' ) {
		if ( empty($xml['category']) ) return _error("No category ?");
		if ( ! in_array($xml['category']['main'], $xml_widget_category ) ) return _error("Wrong category. Allowed categoryies are : " . _print( $xml_widget_category ) );
		if ( ! empty($xml['category']['sub']) && ! in_array($xml['category']['sub'], $xml_widget_sub_category ) ) return _error("Wrong sub category. Allowed sub categories are : " . _print( $xml_widget_sub_category ) );
	}
	// theme type check
	if ( $xml['type'] == 'theme' ) {
		if ( empty($xml['category']) ) return _error("No category ?");
		if ( ! in_array($xml['category'], $xml_theme_category ) ) return _error("Wrong category. Allowed categoryies are : " . _print( $xml_theme_category ) );
	}
	
	if ( empty( $xml['name'] ) ) return _error("No name ?");
	if ( empty( $xml['version'] ) ) return _error("No version ?");
	if ( empty( $xml['author'] ) ) return _error("No author ?");
	if ( empty( $xml['email'] ) ) return _error("No email ?");
	if ( empty( $xml['short'] ) ) return _error("No short ?");
	
	
function _error( $msg )
{
	echo "ERROR : $msg";
}
	
function _print( $v )
{
	$out .= "<br>";
	foreach( $v as $e ) {
		$out .= "$e<br>";
	}
	return $out;
}
