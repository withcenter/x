<?php


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
$extra = ms::get_extra( );

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



x::hook_register( 'write_update_end', 'hook_write_update_end' );
function hook_write_update_end()
{
	dlog("hook_write_update_end() begins");
}

