<?php
	$path = $dir_root . '/lib/visit.lib.php';
	$data = file::read($path);
	$src = 'include_once ($visit_skin_path.';
	$dst = "
	include x::dir() . '/etc/hook/vist.lib.before-skin.php'; /* x patch */
	$src";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	

	