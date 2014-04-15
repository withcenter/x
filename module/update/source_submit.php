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
	
	// widget check
	if ( $xml['type'] == 'widget' ) {
		if ( empty($xml['category']) ) return _error("No category ?");
		if ( ! in_array($xml['category']['main'], $xml_widget_category ) ) return _error("Wrong category. Allowed categoryies are : " . _print( $xml_widget_category ) );
		if ( ! empty($xml['category']['sub']) && ! in_array($xml['category']['sub'], $xml_widget_sub_category ) ) return _error("Wrong sub category. Allowed sub categories are : " . _print( $xml_widget_sub_category ) );
	}
	
	
	
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
