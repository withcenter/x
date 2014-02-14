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
function hook_blog_push()
{
	global $wr_id, $g5, $bo_table, $in, $wr_content;
	//$query = db::row('SELECT * FROM '.$g5['write_prefix'].$bo_table.' WHERE wr_id = '.$wr_id);
	//di($query);
	//exit;
	if ( $query['wr_1'] ){
		$blog_no = $query['wr_1'];
	}
	//exit;
	if ( $in['w'] == 'u' ) $mode = 'edit';
	else $mode = 'write';
	
	$api_end_point = ms::meta('api-end-point');
	$api_username = ms::meta('api-username');
	$api_password = ms::meta('api-password');
	
	
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
					$files .= "<div class='uploaded-file'>File #".$file_num.": <a href='".$items['href']."'>".$items['source']."</a></div>";					
					$file_num++;
				}
				else continue;				
			}			
		}
		$wr_content = $files.$images.$wr_content;		
	}
	
	include x::dir() . '/etc/service/push_to_blog.php';
}
