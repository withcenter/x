<?php
/**
 *  
 *  
 */
error_reporting(E_ALL ^ E_NOTICE);

if ( $argv[1] == 'install' ) {
	include "etc/patch/translate_installation_page_to_english.php";
	exit;
}



define('_INDEX_', true);
include_once('../common.php');

$dir_root = G5_PATH;


include_once ($dir_root.'/x/etc/class.php');

if ( $argv[1] == 'language' ) {
	include "etc/patch/language.php";
	exit;
}


/**
 *  @todo patch base on version
 */


	include x::dir() . "/etc/patch/x.php";
	include x::dir() . "/etc/patch/index.php";
	include x::dir() . "/etc/patch/database.php";
	include x::dir() . "/etc/patch/jquery.php";
	//include x::dir() . "/etc/patch/begin_end.php";
	include x::dir() . "/etc/patch/head.php";
	include x::dir() . "/etc/patch/tail.php";
	include x::dir() . "/etc/patch/tail.sub.php";

	
	include x::dir() . "/etc/patch/write_update.php";
	include x::dir() . "/etc/patch/delete.php";
	include x::dir() . "/etc/patch/outlogin.lib.php";
	include x::dir() . "/etc/patch/latest.lib.php";
	include x::dir() . "/etc/patch/head.sub.php";
	
	
	echo "\n-- PATCH SUCCESS --\n";
	
	
	
	
function patch_failed()
{
	patch_message("\n-----------------------------  FAILED --");
	exit;
}



function pattern_exist( $data, $src )
{
	return strpos($data, $src);
}







function patch_data( $data, $patch, $replace )
{
	if ( pattern_exist( $data, $patch ) ) $data = str_replace($patch, $replace, $data);
	else {
		if ( pattern_exist( $data, $replace ) ) message("alredy patched");
		else {
			message("patch: $patch, replace: $replace");
			patch_failed();
		}
	}
	return $data;
}



/**
 *  @brief patches a file
 *  
 *  @param [in] $file file path
 *  @param [in] $kvs patch list
 *  @return empty
 *  
 *  @details patches a file with assoc array
 */
function patch_file( $file, $kvs )
{
	if ( empty($file) ) patch_failed();
	
	$data = file::read($file);
	
	if ( empty($data)  ) {
		message("file empty");
		patch_failed();
	}
	foreach ( $kvs as $patch => $replace ) {
		
		if ( pattern_exist( $data, $patch ) ) $data = str_replace($patch, $replace, $data);
		else {
			if ( pattern_exist( $data, $replace ) ) {
				// alredy patched
			}
			else {
				echo "patch string $patch and code $replace does not eixst in $file";
				patch_failed();
			}
		}
		
	}
	file::write( $file, $data );
	patch_message("patched: $file");
}



function patch_string( $string, $src, $dst )
{
	if ( empty($string) ) {
		echo " [ERROR] No php source data";
	}
	if ( pattern_exist($string, $dst) ) {
		patch_message('already patched');
	}
	else {
		if ( ! pattern_exist($string, $src) ) {
			patch_message( " Srouce pattern does not exist. FAILED\nsource patttern : [$src]");
			patch_failed();
		}
		else {
			$string = str_replace( $src, $dst, $string );
			patch_message('patched');
		}
	}
	return $string;
}

function patch_message($str)
{
	$files = get_included_files();
	$file = $files[ count($files) - 1];
	$pi = pathinfo($file);
	$basename = $pi['basename'];
	printf( "%-20s: $str\n", $basename, $str);
}
