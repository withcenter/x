<?php

	/** @short 아래의 코드는 웹 브라우저로 그누보드5 & Extended 처음 설치시에 같이 설치가 되도록 하기 위한 코드이다.
	 *
	 *
	 */
	include_once "$dir_root/x/class/etc.php";
	include_once "$dir_root/x/class/database.php";
	include_once "$dir_root/x/class/x.php";
	include_once "$dir_root/x/class/gnuboard.php";
	
	if ( ! function_exists( 'patch_message' ) ) {
		function patch_message()
		{
		}
	}
	
	if ( empty($g5['group_table']) ) {
		$g5['write_prefix']		= $table_prefix . "write_";
		$g5['group_table']		= $table_prefix . "group";
		$g5['board_table']		= $table_prefix . "board";
	}
	/** eo */
	define('G5_NEW_PATH', '..');
	

	if ( g::group_exist('multisite') ) {
		patch_message("multisite group already created");
	}
	else {
		g::group_create( array('id'=>'multisite', 'subject'=>'multisite') );
		patch_message("multisite group created");
	}
	if ( g::forum_exist( 'default' ) ) {
		patch_message("default forum already created");
	}
	else {
		g::board_create( array('id'=>'default', 'subject'=>'Default Forum', 'group_id'=>'multisite') );
		patch_message("default  forum created");
	}
