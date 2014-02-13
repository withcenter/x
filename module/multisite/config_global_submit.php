<?php

/** new config meta update method */
ms::meta('title', $in['title']);
ms::meta('secondary_title', $in['secondary_title']);
ms::meta('footer_text', strip_tags($in['footer_text']));

for( $i = 1; $i <= 10; $i++ ) {
	ms::meta('forum_no_'.$i, $in['forum_no_'.$i]);
}

ms::meta('logo_text',strip_tags($in['logo_text']));
ms::meta('banner1_text1',strip_tags($in['banner1_text1']));
ms::meta('banner1_text2',strip_tags($in['banner2_text1']));
ms::meta('banner2_text1',strip_tags($in['banner2_text1']));

ms::meta('banner2_text2',strip_tags($in['banner2_text2']));
ms::meta('theme_sidebar',$in['theme_sidebar']);



/* upload Global Settings Files ex. header_logo, banner_1, banner_2 to g5/data/upload/multisite/site_name/file_name.ext */
$root = G5_PATH.'/'.G5_DATA_DIR.'/upload/';
$path = $root.'multisite/';
$site = explode( '.' , etc::domain());
$folder = $path.$site[0].'/';

if(!is_dir($path)) { 
	mkdir($root);
	mkdir($path);
}
if(!is_dir($folder)) mkdir($folder);

$img_url = G5_DATA_DIR.'/upload/multisite/'.$site[0].'/';
ms::meta('img_url', $img_url );

foreach($_FILES as $key => $value) {
	if( $in[$key.'_remove'] == 'y' ) ms::meta( $key , '' );						 // if checkbox( file-upload-name_remove ) == 'y' 
																				 // then set meta ( file-upload-name = '' ) to remove photo												 
	$file_info = pathinfo($value['name']);
	if( $name = $file_info['filename'] ) {
		while(file_exists($folder.$name)) $name = rand(000000,999999).'_'.$name; // if file exists, add random 6 digit numbers before name
		$target = $folder.$name;												 // ex: 123456_filename
		move_uploaded_file( $_FILES[$key]['tmp_name'], $target);
		ms::meta ( $key, $name );
	}
	
}

if ( file_exists( ms::theme('setting_submit') ) ) include ms::theme('setting_submit');
jsGo("?module=$module&action=config_global");