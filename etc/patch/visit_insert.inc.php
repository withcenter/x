<?php
	$path = $dir_root . '/bbs/visit_insert.inc.php';
	$data = file::read($path);
	$src = "if (!defined('_GNUBOARD_')) exit;";
	$dst = "
	return; /** x patch */
	$src
	";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	

	