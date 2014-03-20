<?php
	$path = $dir_root . '/head.sub.php';
	$data = file::read($path);
	
	
	$src = "<body>";
	$dst = "$src
<?php include x::dir() . '/etc/hook/body_begin.php';?>";
	
	
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	