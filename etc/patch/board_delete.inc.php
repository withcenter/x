<?php
	$path = $dir_root . '/adm/board_delete.inc.php';
	$data = file::read($path);
	$src = '?>';
	$dst = "
include x::dir() . '/etc/hook/board_delete.inc.php'; /* x patch */
$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	

	