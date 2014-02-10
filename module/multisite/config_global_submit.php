<?php
/* upload Global Settings Files ex. header_logo, banner_1, banner_2 to g5/data/upload/multisite/site_name,
   note: I haven't tried making a create thumbnail or image resize function yet.
*/

$path = G5_PATH.'/'.G5_DATA_DIR.'/upload/multisite/';
$site = explode( '.' , etc::domain());
$folder = $path.$site[0].'/';
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
jsGo("?module=$module&action=config_global");