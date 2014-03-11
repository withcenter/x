<?php

/**remove tags*/
foreach ( $in as $key => $value) {
	if( $key == 'footer_text' ){
		$in[$key] = preg_replace("/\<.*script/", "<", $value); /// @warning : this code is a worng. < is not a meta code. just a malusage.
	}
	else{
		$in[$key] = strip_tags($value);		
	}
}


/** new config meta update method */
ms::meta( 'title' , $in['title'] );
ms::meta( 'secondary_title' , $in['secondary_title'] );
ms::meta( 'footer_text' , $in['footer_text'] );


/** @warning: is this a bug? when a user set for a community and changed to blog and set, finally back to the community then the old setting gone? */
for( $i = 1; $i <= 10; $i++ ) {
	ms::meta( 'forum_no_'.$i , $in['forum_no_'.$i] );
}

ms::meta( 'theme_sidebar' , $in['theme_sidebar'] );

/* upload Global Settings Files ex. header_logo, banner_1, banner_2 to g5/data/upload/multisite/site_name/file_name.ext */
$folder = path_multi_upload( etc::last_domain(etc::domain()) );
if( !is_dir( $folder ) ) mkdir( $folder, 0777, true );



foreach( $_FILES as $name => $file ) {
	if ( $in["{$name}_remove"] == 'y' ) @unlink( x::path_file( $name ) );
	$pi = pathinfo( $file['name'] );
	$allowed_files = array( 'jpg', 'jpeg', 'gif', 'png' );
	if ( !empty( $pi['basename'] ) && !in_array( strtolower($pi['extension']), $allowed_files ) ) jsGo("?module=$module&action=config_global","Invalid File(s), Please upload Image Files Only, ex: .jpg, .jpeg, .png, .gif, .bmp");
	else {
		move_uploaded_file( $file['tmp_name'] , $folder.$name );				 // ex: 123456_filename
	}
}


if ( file_exists( x::theme('setting_submit') ) ) include x::theme('setting_submit');
jsGo("?module=$module&action=config_global");
