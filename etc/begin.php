<?php
/** @short variables to replace those in skin files. ( like outlogin.lib.php )
 * https://docs.google.com/a/withcenter.com/document/d/1Q3cunvTGTmGTathp_Jx4LTVn8tdsNzqsZmmpE8kLsvg/edit#heading=h.1zkefc3j0po6
 */
	
	$global_skin_dir = null;				// this is used in all the skin(widget)
	$outlogin_skin_path=null;
	$outlogin_skin_url=null;
	$latest_skin_path = null;
	$latest_skin_url  = null;
	$global_bo_table = null;			// $bo_table
	
	$error_hook_latest = null;
	
	
	if ( etc::web() ) include x::dir() . '/etc/rewrite/bbs/visit_insert.inc.php';
	
	
// -----------------------------------------------------------------------------
//
// @TODO ordered by JaeHo
// 1. FIND A BETTER PLACE FOR THIS HOOK. 'x/begin.php' IS NOT A GOOD PLACE FOR HOOK.
// 2. Do not let admin to input CSS or Javascript.
// 3. Do not use anonymous function. it produces error on PHP 5.2 and below.
//
/** first if: display sidebar to left or right based on the multisite admin settings
	second if: attach custom css based on the multisit admin settings
 */

/** 1. Moved the Hook to init.php of Theme Folder
	2. Removed Custom CSS Textarea on config_global.php
*/

//Multisite Config Options
// $extra = ms::get_extra( );
/** @short load 'register_result.skin.php' in the 'x/theme/xxxx/' folder instead of 'skin/' folder.
 *  
 */
if ( strpos($_SERVER['PHP_SELF'], 'register_result.php') !== false && file_exists(x::theme('register_result.skin')) ) {
	$member_skin_path	= x::theme_folder();
	$member_skin_url	= x::theme_url(  );
}
/** @short the code below are the same as above.
 * 
if ( strpos($_SERVER['PHP_SELF'], 'register_result.php') !== false ) {
	
	if (isset($_SESSION['ss_mb_reg']))
		$mb = get_member($_SESSION['ss_mb_reg']);

	// 회원정보가 없다면 초기 페이지로 이동
	if (!$mb['mb_id'])
		goto_url(G5_URL);

	$g5['title'] = '회원가입이 완료되었습니다.';
	include_once('./_head.php');
	$path = x::theme('register_result.skin');
	if ( file_exists( $path ) ) {
		include_once( $path );
	}
	else include_once($member_skin_path.'/register_result.skin.php');
	include_once('./_tail.php');
	exit;
}
*/

x::hook_register( 'write_update_end', 'hook_blog_push' );
x::hook_register( 'delete_end', 'hook_blog_push' );

function hook_blog_push( $hook )
{
	global $wr_id, $g5, $bo_table, $in, $wr_subject, $wr_content;
	
	
	if ( $in['w'] == 'u' ) {
		dlog("Blog push updating begins");
		$mode = 'edit';
	}
	else $mode = 'write';
	


	
	if ( $hook == 'delete_end' ) {
		$wr_subject = "삭제되었습니다.";
		$wr_content = "삭제되었습니다.";
		$mode = 'edit';
		$in['w'] = 'u';
	}
	
	
	
	$info = get_file ( $bo_table, $wr_id );
	
	$file_num = 1;
	if ( $info['count'] == 0 ){
		
	}
	else{
		foreach ( $info as $items ){
			if ( $items['view'] ){
				$images .= "<div class='uploaded-image'>".$items['view']."</div>"; 				
			}
			else{
				if( $items['source'] ){
					$files .= "<div class='uploaded-file'>다운로드 파일 #".$file_num.": <a href='".$items['href']."'>".$items['source']."</a></div>";					
					$file_num++;
				}
				else continue;				
			}			
		}
		$wr_content = $files.$images.$wr_content;		
	}
	
	
	
	//for ( $cb = 0; $cb < MAX_BLOG_WRITER; $cb ++ ) {
	
		include_once x::dir() . '/etc/service/push_to_blog.php';
	
}
// https://docs.google.com/a/withcenter.com/document/d/1Q3cunvTGTmGTathp_Jx4LTVn8tdsNzqsZmmpE8kLsvg/edit#heading=h.1zkefc3j0po6
x::hook_register( 'outlogin', 'hook_outlogin_path' );
function hook_outlogin_path()
{
	global $global_skin_dir, $outlogin_skin_path, $outlogin_skin_url;
	
	if ( G5_IS_MOBILE ) $mobile_path = "/mobile";
	
	$path = x::dir() . "/skin$mobile_path/outlogin/" . $global_skin_dir;
	if ( file_exists( $path ) ) {
		$outlogin_skin_path = $path;
		$outlogin_skin_url = x::url() . "/skin$mobile_path/outlogin/" . $global_skin_dir;
	}
	
	//dlog("global_skin_dir: $global_skin_dir");
	//dlog("outlogin_skin_path: $outlogin_skin_path");
	//dlog("outlogin_skin_url: $outlogin_skin_url");
	
	
}
/*
x::hook_register( 'latest_after_skin_info', 'hook_latest_path' );
function hook_latest_path()
{
}
*/
/*
x::hook_register( 'latest_after_skin_info', 'hook_latest_check' );
function hook_latest_check()
{
	global $error_hook_latest, $global_bo_table;
	if ( g::forum_exist( $global_bo_table ) ) return;
	else $error_hook_latest = FORUM_NOT_EXIST;
}
*/





/**
 *  @short login.php
 */
if ( strpos($_SERVER['PHP_SELF'], 'login.php') !== false ) {
	include_once G5_PATH . '/_head.php';
	x::hook_register('end', 'hook_show_tail');
	function hook_show_tail()
	{
		global $config;
		include_once G5_PATH . '/_tail.php';
	}
}






/** @short reset board skin path for PC and mobile.
 *  
 *  @note if there is board skin under x/skin/board folder, G5, then, can use it as its board skin.
 *  All the codes between G5/skin/board folder and x/skin/board folder are compatible.
 *  @see etc/end.php for re-setting the folders of x/skin/board folder.
 * https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.hthvy4o49hmo
 */
if ( G5_IS_MOBILE ) $mobile = "mobile/";
$p = "{$mobile}skin/board/x/";
$board_skin_path = str_replace($p, 'x/', $board_skin_path);
$board_skin_url = str_replace("{$mobile}skin/board/x/", 'x/', $board_skin_url);
/** @short if 'skin/board/basic' was chosen by default, it will be reset to /x/skin/board/multi' here. */
if ( strpos( $board_skin_path, "board/basic" ) ) {
	$board_skin_path = x::dir() . "/skin/board/multi";
	$board_skin_url = x::url() . "/skin/board/multi";
}



/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.an2o30375xzf
x::hook_register( 'begin', 'hook_begin_status' );
function hook_begin_status()
{
	$status = x::meta_get( etc::domain(), 'status' );
	if ( $status == 'close' ) {
		jsGo( g::url_base(), "This site has been closed." );
	}
}



// Set default mobile theme to 'mobile-commuity-1' if it has no MOBILE theme.
x::hook_register('before_theme_init', 'hook_theme_change');
function hook_theme_change()
{
	if ( G5_IS_MOBILE ) {
		x::$config['site']['theme'] = meta('mobile_theme');
		if ( empty(x::$config['site']['theme']) ) x::$config['site']['theme'] = "mobile-community-1";
	}
}
/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.2jz9ybhuk887
x::hook_register( 'body_begin' , 'hook_body_begin');
function hook_body_begin()
{
	global $done_head_begin_skin_update;
	if ( $done_head_begin_skin_update ) return;
	else $done_head_begin_skin_update = 1;
	$url = x::url() . '/css/skin-update.css';
	echo "<link rel='stylesheet' href='$url'>\n";
	
	
	$url = x::url() . '/js/default.js';
	echo "<script src='$url'></script>\n";
	
	$url = x::url() . '/js/skin-update.js';
	echo "<script src='$url'></script>\n";
	
	
}
x::hook_register( 'module_begin' , 'hook_module_begin');
function hook_module_begin() {
	global $module, $action;
	if ( preg_match('/^config/', $action) ) include x::dir() . "/module/$module/config_header.php";
}


x::hook_register('latest_before_return', 'hook_latest_before_return');
function hook_latest_before_return()
{
	dlog("hook_latest_before_return begin:");
	if ( admin() ) {
		global $content, $global_skin_dir, $global_bo_table;
		$code = x::skin_code( $global_skin_dir, $global_bo_table );
		$content = "<div class='skin-update'><div class='skin-update-button' code='$code'>admin</div>$content</div>";
	}
}
