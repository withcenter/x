<?php
/**
 *  @brief plants x/etc/install.php in common.php where it should be loaded upon installation.
 *  
 *  @return empty
 *  
 *  @details use this to translate Korean to English for installation page.
 */
	include 'class/file.php';
	
	$path = '../common.php';
	$data = file::read($path);
	$src = "<!doctype html>";
	$dst = "<?include 'x/etc/install/install.php'?>
$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	
	
	
	
	$path = '../install/index.php';
	$data = file::read($path);
	$src = "include_once ('../config.php');";
	$dst = "return include '../x/etc/install/index.php';
return;
$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	
	
	
	
	$path = '../install/install.inc.php';
	$data = file::read($path);
	$src = "if (!defined('_GNUBOARD_'))";
	$dst = "include '../x/etc/install/install.inc.php';
return;
$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	
	
	
	
	
	
	
	
	$path = '../install/install_db.php';
	$data = file::read($path);
	$src = "@set_time_limit(0);";
	$dst = "include '../x/etc/install/install_db.php';
return;
$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	
	
	
	
	
	
	
	
	$path = '../install/install_config.php';
	$data = file::read($path);
	$src = '$gmnow = gmdate';
	$dst = "include '../x/etc/install/install_config.php';
return;
$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	
	
	
	
	
	