<?php
/** @short variables to replace those in skin files. ( like outlogin.lib.php )
 * https://docs.google.com/a/withcenter.com/document/d/1Q3cunvTGTmGTathp_Jx4LTVn8tdsNzqsZmmpE8kLsvg/edit#heading=h.1zkefc3j0po6
 */
	$skin_folder = null;				// this is used in all the skin(widget)
	$outlogin_skin_path=null;
	$outlogin_skin_url=null;
	$latest_skin_path = null;
	$latest_skin_url  = null;
	
	
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
if ( strpos($_SERVER['PHP_SELF'], 'register_result.php') !== false && file_exists(x::theme('register_result.skin')) ) $member_skin_path = x::theme_folder();
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
					$files .= "<div class='uploaded-file'>파일명 #".$file_num.": <a href='".$items['href']."'>".$items['source']."</a></div>";					
					$file_num++;
				}
				else continue;				
			}			
		}
		$wr_content = $files.$images.$wr_content;		
	}
	
	
	
	//for ( $cb = 0; $cb < MAX_BLOG_WRITER; $cb ++ ) {
	
		include x::dir() . '/etc/service/push_to_blog.php';
	
}
// https://docs.google.com/a/withcenter.com/document/d/1Q3cunvTGTmGTathp_Jx4LTVn8tdsNzqsZmmpE8kLsvg/edit#heading=h.1zkefc3j0po6
x::hook_register( 'outlogin', 'hook_outlogin_path' );
function hook_outlogin_path()
{
	global $skin_folder, $outlogin_skin_path, $outlogin_skin_url;
	$path = x::dir() . "/widget/outlogin/" . $skin_folder;
	if ( file_exists( $path ) ) {
		$outlogin_skin_path = $path;
		$outlogin_skin_url = x::url() . "/widget/outlogin/" . $skin_folder;
	}
	/*
	dlog("skin_folder: $skin_folder");
	dlog("outlogin_skin_path: $outlogin_skin_path");
	dlog("outlogin_skin_url: $outlogin_skin_url");
	*/
}

x::hook_register( 'latest', 'hook_latest_path' );
function hook_latest_path()
{
	global $skin_folder, $latest_skin_path, $latest_skin_url;
	$path = x::dir() . "/widget/latest/" . $skin_folder;
	if ( file_exists( $path ) ) {
		$latest_skin_path = $path;
		$latest_skin_url = x::url() . "/widget/latest/" . $skin_folder;
	}
	
	dlog("skin_folder: $skin_folder");
	dlog("latest_skin_path: $latest_skin_path");
	dlog("latest_skin_url: $latest_skin_url");
}

