<?php
/**
 *  
 *  https://docs.google.com/a/withcenter.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/edit#heading=h.22001fpn27cu
 */
error_reporting(E_ALL ^ E_NOTICE);

if ( $argv[1] == 'install' ) {
	include "etc/patch/translate_installation_page_to_english.php";
	exit;
}

/** G5 must be installed first before this.
 *
 *
 */
$path_dbconfig = "../data/dbconfig.php";
if ( ! file_exists( $path_dbconfig ) ) {
	echo "ERROR: To patch 'X', you must install GNUBoard5 first.\n";
	exit;
}
define('_INDEX_', true);
include_once('../common.php');


/// to prevent sesion warnings.
session_destroy();
$dir_root = G5_PATH;


include_once ($dir_root.'/x/etc/class.php');

if ( $argv[1] == 'language' ) {
	include "etc/patch/language.php";
	exit;
}


/**
 *  @todo patch base on version
 */


	include x::dir() . "/etc/patch/common.php";
	include x::dir() . "/etc/patch/x.php";
	include x::dir() . "/etc/patch/index.php";
	include x::dir() . "/etc/patch/database.php";
	include x::dir() . "/etc/patch/jquery.php";

	include x::dir() . "/etc/patch/head.php";
	include x::dir() . "/etc/patch/head.sub.php";
	include x::dir() . "/etc/patch/tail.php";
	include x::dir() . "/etc/patch/tail.sub.php";

	
	
	include x::dir() . "/etc/patch/outlogin.lib.php";
	include x::dir() . "/etc/patch/latest.lib.php";
	
	
	
	include x::dir() . "/etc/patch/visit_insert.inc.php";
	include x::dir() . "/etc/patch/visit.lib.php";
	include x::dir() . "/etc/patch/board.php";
	include x::dir() . "/etc/patch/board_delete.inc.php";
	
	include x::dir() . "/etc/patch/write_update.php";
	include x::dir() . "/etc/patch/write_comment_update.php";
	include x::dir() . "/etc/patch/delete.php";
	include x::dir() . "/etc/patch/delete_comment.php";
	include x::dir() . "/etc/patch/good.php";
	
	include x::dir() . "/etc/patch/create_default_forum.php";

	echo "\n-- PATCH SUCCESS --\n";
	
	
	
	
function patch_failed()
{
	patch_message("\n-----------------------------  FAILED --");
	exit;
}



function pattern_exist( $data, $src )
{
	return strpos($data, $src) !== false ;
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
			patch_message( "Srouce pattern does not exist. FAILED\nsource patttern : [$src]\nFile Content:\n$string");
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
