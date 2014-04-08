<?php
/**
 * @file index.php
 * @desc X start script.
 */
	define('_INDEX_', true);
	include_once('../common.php');			/// @important : x/begin.php will be loaded by this script.
												/// 
	/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.bqguddm7sk01
	if ( $in['theme'] == 'y' ) {
	}
	else if ( $in['theme'] == 'n' || preg_match("/_submit$/", $action) ) {
		include x::dir() . '/etc/load_module.php';
		include 'end.php';
		exit;
	}

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
		echo "<a href='?module=admin&action=index' style='display:block; padding: 3em; font-size: 2em; color: red;'>X ADMIN Page</a>";
	}
	
	include_once(G5_PATH.'/tail.php');					/// @important : x/end.php will be loaded by this script.

	/** end of start script */
