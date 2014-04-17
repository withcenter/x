<?php
	include 'class.update.php';

	$data['count_theme'] = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'theme'
		)
	);
	
	$data['count_widget'] = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'widget'
		)
	);
	
	$data['count_module'] = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'module'
		)
	);
	
	
	if ( $in['type'] ) {
	
	}
	echo "$in[callback](" . json_encode( $data ) . ")";

