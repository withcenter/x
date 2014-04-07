<?php
	meta_set( "widget_config.$code", string::scalar( $in ) );
	$dir_widget_data = g::dir() . '/data/widget';
	if( ! is_dir( $dir_widget_data ) ) mkdir( $dir_widget_data, 0777, true );
	

	
	
		
	foreach( $_FILES as $name => $file ) {
		$path = widget_data_path( $code, $name );
		if ( $in["{$name}_remove"] == 'y' ) @unlink( $path );
		if ( $file['error'] == UPLOAD_ERR_NO_FILE ) continue;
		$pi = pathinfo( $file['name'] );
		if ( ! in_array( strtolower($pi['extension']), array( 'jpg', 'gif', 'png' ) ) ) return jsBack("Invalid File(s). Only JPG, GIF, PNG with proper extenstion are allowed.");
		else  move_uploaded_file( $file['tmp_name'] , $path );		
	}

	
	
	if ( $submit_value == 'Submit & Close' ) {
		echo "<script>parent.location.reload();</script>";
		return;
	}
	else {
		return jsGo("?module=$module&action=update&code=$code&theme=n&done=1");
	}
