<?php
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

$in['img_url'] = G5_DATA_DIR.'/upload/multisite/'.$site[0].'/';

foreach($_FILES as $key => $value) {
	$file_info = pathinfo($value['name']);
	if( $name = $file_info['filename'] ) {
		while(file_exists($folder.$name)) $name = rand(000000,999999).'_'.$name;
		$in[$key] = $name;
		$target = $folder.$name;
		move_uploaded_file( $_FILES[$key]['tmp_name'], $target);
	}
}

ms::update( $in );
if ( file_exists( ms::theme('setting_submit') ) ) include ms::theme('setting_submit');
jsGo("?module=$module&action=config_global");