<?php
	include 'class.update.php';
	include 'dist-menu.php';
	include module('config.source.php');
	
	$u = parse_url($project_url);
	$git_raw_host = "raw.githubusercontent.com";
	$url_config = "https://$git_raw_host$u[path]/master/config.xml";
	

	echo "Reading $url_config ...<br>";
	

	try {
		@$xml = load_xml( $url_config );
	}
	catch ( Exception $e ) {
		echo "Eorror : " . $e->getMessage();
		return;
	}
	
	if ( empty($xml) ) return _error("Failed on reading config.xml. Please check if the XML is malformed or wellformed.");
	
	
	if ( empty( $xml['type'] ) ) {
		return _error( "No type?" );
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
		if ( empty($xml['view']) ) return _error("No view? 'View' must be either pc or mobile.");
	}
	
	if ( empty( $xml['id'] ) ) return _error("No ID?");
	
	if ( empty( $xml['name'] ) ) return _error("No name ?");
	if ( empty( $xml['version'] ) ) return _error("No version ?");
	if ( empty( $xml['author'] ) ) return _error("No author ?");
	if ( empty( $xml['email'] ) ) return _error("No email ?");
	
	// short check
	$has_short = 0;
	if ( $xml['short'] ) {
		foreach ( $xml['short'] as $lang => $short ) {
			if ( ! empty($short) ) {
				$has_short = 1;
				break;
			}
		}
	}
	if ( $has_short == 0 ) return _error("No short ?");
	
	
	$data = x::data( 'source', $xml['type'], $xml['id'] );
	
	if ( $data && ( $data['id'] != my('id') ) ) return _error("source ID exists. but it is not your source. Change the ID or log into the user.");
	
	
	$o =	array(
			'first'				=> 'source',
			'second'			=> $xml['type'],
			'third'				=> $xml['id'],
			'id'				=> my('id'),
			up::project_url			=> $project_url,
			up::name			=> string::scalar($xml['name']),
			up::category		=> $xml['category'],
			up::author			=> $xml['author'],
			up::email			=> $xml['email'],
			up::version			=> $xml['version'],
			up::homepage		=> $xml['homepage'],
			up::demo			=> $xml['demo'],
			up::short			=> string::scalar( $xml['short'] ),
			up::detail			=> string::scalar( $xml['detail'] ),
		);
	if ( is_array($xml['category']) ) {
		$o[ up::category ] = $xml['category']['main'];
		$o[ up::sub_category ] = $xml['category']['sub'];
	}
	
	$re = x::data_update( $o );
	
	if ( $re == 1 ) echo "UPDATED";
	else if ( $re == 2 ) echo "INSERTED";
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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
