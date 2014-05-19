<?php
/**
 * @file index.php
 * @desc this is the 'index.php' as X start script.
 * @warning It is a start script by itself. and It is also included by g5/index.php when it is accessed with the HTTP vars like 'module', 'action', 'page'.
 * 
 */
	if ( ! isset($dir_root) ) $dir_root = '..';
	
	define('_INDEX_', true);
	
	/** @short including g5 common.php
	  *
		loads g5/common.php when it is accessed as start script.
		@note x/begin.php will be loaded by common.php
		
		@note g5/common.php must be loaded when g5/x/index.php is accessed as start script.
		@todo but when g5/index.php is accessed as start script, then common.php is not needed to be loaded again. that's why it is 'include_once'
			make it not to include if it is accessed by g5/index.php
	  *
	  */
	include_once("$dir_root/common.php");
	/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.bqguddm7sk01
	if ( $in['theme'] == 'y' ) {
	}
	else if ( $in['theme'] == 'n' || preg_match("/_submit$/", $action) ) {
		include x::dir() . '/etc/load_module.php';
		include 'end.php';
		exit;
	}

	/** loads g5/head.php -> theme/name/head.php */
	include_once(G5_PATH.'/head.php');
	
	
	/** @short Display menu on admin page */
	if ( preg_match('/^admin_/', $action) ) include x::admin_menu();
	if ( ! empty( $module ) ) {
		include x::dir() . '/etc/load_module.php';
	}
	else if ( $in['page'] ) {
		include x::theme( $in['page'] );
	}
	else {
		/** @todo put this HTML into etc/doc/wrong-input.php */
		echo "<a href='?module=admin&action=index' style='display:block; padding: 3em; font-size: 2em; color: red;'>X ADMIN Page</a>";
	}
	
	/** loads g5/tail.php -> theme/name/tail.php */
	include_once(G5_PATH.'/tail.php');					/// @important : x/end.php will be loaded by this script.

	/** end of start script */
