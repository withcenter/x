<?php
	$path = $dir_root . '/head.php';
	$data = file::read($path);
	$src = "<!-- 상단 시작 { -->";
	$dst = "
<?php
	/** x patch */
	x::hook( 'head_begin' );
	if ( file_exists( x::hook(__FILE__) ) ) {
		include x::hook(__FILE__);
		return;
	}
?>
	$src
	";
	$data = patch_string( $data, $src, $dst );
	file::write( $path,  $data );
	