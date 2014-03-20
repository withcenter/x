<?php
db::query("SET AUTOCOMMIT=0");
db::query("START TRANSACTION");

/**remove tags*/
foreach ( $in as $key => $value) {
	if( $key == 'footer_text' ){
		$in[$key] = preg_replace("/\<.*script/", "<", $value); /// @warning : this code is a worng. < is not a meta code. just a malusage.
	}
	else{
		$in[$key] = strip_tags($value);		
	}
}


/* config_global_search.php */
meta_set('all_site_search', $in['all_site_search']);
meta_set('site_search', $in['site_search']);


/** new config meta update method */
meta_set( 'title' , $in['title'] );
meta_set( 'secondary_title' , $in['secondary_title'] );
meta_set( 'footer_text' , $in['footer_text'] );

meta_set( 'theme_sidebar' , $in['theme_sidebar'] );

meta_set( 'member_skin' , $in['member_skin'] );


for( $i=1; $i<=10; $i++ ) {
	$m = 'top';
		x::meta( "menu$m{$i}bo_table", $in[ "menu$m{$i}bo_table" ] );
		x::meta( "menu$m{$i}name", $in[ "menu$m{$i}name" ] );
		x::meta( "menu$m{$i}target", $in[ "menu$m{$i}target" ] );
	$m = 'left';
		x::meta( "menu$m{$i}bo_table", $in[ "menu$m{$i}bo_table" ] );
		x::meta( "menu$m{$i}name", $in[ "menu$m{$i}name" ] );
		x::meta( "menu$m{$i}target", $in[ "menu$m{$i}target" ] );
	$m = 'right';
		x::meta( "menu$m{$i}bo_table", $in[ "menu$m{$i}bo_table" ] );
		x::meta( "menu$m{$i}name", $in[ "menu$m{$i}name" ] );
		x::meta( "menu$m{$i}target", $in[ "menu$m{$i}target" ] );
	$m = 'bottom';
		x::meta( "menu$m{$i}bo_table", $in[ "menu$m{$i}bo_table" ] );
		x::meta( "menu$m{$i}name", $in[ "menu$m{$i}name" ] );
		x::meta( "menu$m{$i}target", $in[ "menu$m{$i}target" ] );
}


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

db::query("COMMIT");
db::query("SET AUTOCOMMIT=1");


if ( file_exists( x::theme('setting_submit') ) ) include x::theme('setting_submit');
jsGo("?module=$module&action=config_global");
