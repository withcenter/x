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
	
	
	/** @short check if the user is super admin when some accesses super admin page
	 *
	 */
	if ( preg_match("/^admin_/i", $action) && ! super_admin() ) { jsBack("관리자가 아닙니다."); exit; }

/** @short Reset board skin path for PC and mobile.
 *  -----------------------------------------------
 *  
 *  @note if there is board skin under x/skin/board folder, G5, then, can use it as its board skin.
 *  All the codes between G5/skin/board folder and x/skin/board folder are compatible.
 *  @see etc/end.php for re-setting the folders of x/skin/board folder.
 * https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.hthvy4o49hmo
 * https://docs.google.com/a/withcenter.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/edit?pli=1#heading=h.wsvgqvozxpkx ( Korean )
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


/** @short RESET MEMBER SKIN for PC and Mobile
 *  -----------------------------------------------
 *  
 * https://docs.google.com/a/withcenter.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/edit?pli=1#heading=h.wsvgqvozxpkx
 */

$member_skin_path = str_replace("mobile/", '', $member_skin_path);
$member_skin_path = str_replace("skin/", 'x/skin/', $member_skin_path);

$member_skin_url = str_replace("mobile/", '', $member_skin_url);
$member_skin_url = str_replace("skin/", 'x/skin/', $member_skin_url);
$member_skin = x::$config['site']['member_skin'];

$member_skin_path = substr_replace( $member_skin_path, "/member/$member_skin", strpos($member_skin_path, '/member/') );
$member_skin_url = substr_replace( $member_skin_url, "/member/$member_skin", strpos($member_skin_url, '/member/') );

	





/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.an2o30375xzf
x::hook_register( 'begin', 'hook_begin_status' );
function hook_begin_status()
{
	$status = x::meta_get( etc::domain(), 'status' );
	if ( $status == 'close' ) {
		jsGo( g::url_base(), "This site has been closed." );
	}
}

x::hook_register( 'write_update_end', 'hook_blog_push' );
x::hook_register( 'delete_end', 'hook_blog_push' );

function hook_blog_push( $hook )
{
	global $wr_id, $g5, $bo_table, $in, $wr_subject, $wr_content;
	
	$blog_api = array();
	for ( $cb = 1; $cb <= 3; $cb++ ) {
		$api_end_point = meta('api-end-point'.$cb);
		$api_username = meta('api-username'.$cb);
		$api_password = meta('api-password'.$cb);
		
		if ( $api_end_point ) {
			$blog_api[$cb] = array(
				'endpoint'	=> $api_end_point,
				'username'	=> $api_username,
				'password'	=> $api_password
			);
		}
	}
	if ( empty( $blog_api ) ) return;
	
	
		
	
	
	if ( $in['w'] == 'u' ) {
		//dlog("Blog push updating begins");
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
	
	
	//dlog("---------------------------------------- hook_blog_push () . include");
	include x::dir() . '/etc/service/push_to_blog.php';
	
}
// https://docs.google.com/a/withcenter.com/document/d/1Q3cunvTGTmGTathp_Jx4LTVn8tdsNzqsZmmpE8kLsvg/edit#heading=h.1zkefc3j0po6
//x::hook_register( 'outlogin', 'hook_outlogin_path' );
/*
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
*/
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










// Set default mobile theme to 'mobile-commuity-1' if it has no MOBILE theme.
/** @note This code is now moved to load_site().
	
	DELETE THIS CODE WHENEVER
	
x::hook_register('before_theme_init', 'hook_theme_change');
function hook_theme_change()
{
	if ( G5_IS_MOBILE ) {
		x::$config['site']['theme'] = meta('mobile_theme');
		if ( empty(x::$config['site']['theme']) ) x::$config['site']['theme'] = "mobile-community-1";
	}
}
*/
/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.2jz9ybhuk887
x::hook_register( 'body_begin' , 'hook_body_begin');

function hook_body_begin()
{
	
	global $done_head_begin_skin_update;
	
	// dlog("hook_body_begin() begins");
	
	if ( $done_head_begin_skin_update ) return;
	else $done_head_begin_skin_update = 1;
	
	
	
	echo "<link rel='stylesheet' type='text/css' href='" . x::url() . "/css/default.css' />\n";
	echo "<script src='".$url = x::url() . '/js/default.js'."'></script>\n";
	
	
	/*
	$url = x::url() . '/css/skin-update.css';
	echo "<link rel='stylesheet' href='$url'>\n";
	
	
	$url = x::url() . '/js/skin-update.js';
	echo "<script src='$url'></script>\n";
	*/
	
	
	// dlog("hook_body_begin() ends");
}
x::hook_register( 'module_begin' , 'hook_module_begin');
function hook_module_begin() {
	global $module, $action;
	if ( preg_match('/^config/', $action) ) include x::dir() . "/module/$module/config_header.php";
}


x::hook_register('latest_before_return', 'hook_latest_before_return');
function hook_latest_before_return()
{
	// dlog("hook_latest_before_return begin:");
	if ( admin() ) {
		global $content, $global_skin_dir, $global_bo_table;
		$code = x::skin_code( $global_skin_dir, $global_bo_table );
		$content = "<div class='skin-update'><div class='skin-update-button' code='$code'>admin</div>$content</div>";
	}
}

/** @todo this code must be hooked on each bbs/member_confirm.php and login() ...
 *  it creates error on member_confirm and login of mobile page()
 *  @short add 'head.php' and 'tail.php' into 'login.php'
 *  ----------------------------------------------------------
 *  @warning This code must be stated at the bottom of begin.php or very first place of head.php to affect the hook.
 *  
 */
if ( login_page() || member_confirm_page() || password_page() ) {
		include_once G5_PATH . '/_head.php';
		x::hook_register('end', 'hook_show_tail');
		function hook_show_tail()
		{
			global $config;
			include_once G5_PATH . '/_tail.php';
		}
}






