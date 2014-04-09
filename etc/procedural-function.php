<?php
/**
 * @file procedural-function.php
 * @desc This script holds functions doing the abstraction of X classes to support procedural coding style.
 *
 */
 
/** @short resets the theme list, so it can be listed out from the beginning to the end.
 *
 * @note this is only EXPERIMENTAL. Why doesn't it just return the array of whole theme list?
 * ---------------------------------------------------------------------------------
 * @note SEE get_site_menu() which just returns the whole list of the site menu.
 * ---------------------------------------------------------------------------------
 *
 * @code How to use theme functions.
				reset_theme();
				while ( next_theme() ) {
					echo 
						theme_dir() . " : " .
						theme_type() . " : " .
						theme_name() .
						"<br>";
				}
 * @endcode
 * @code
 			<select name='theme'>
				<?
					$theme = x::meta_get( $in['domain'], 'theme' );
					reset_theme();
					while ( next_theme() ) {
				?>
					<option value="<?=theme_dir()?>" <? if ( theme_dir() == $theme ) echo "selected=1"; ?>><?=theme_name()?></option>
				<?
					}
				?>
			</select>
 * @endcode
 */
function reset_theme()
{
	global $_theme_list;
	if ( ! isset( $_theme_list ) ) {
		$_theme_list = array();
		$dirs = file::getDirs(X_DIR_THEME);
		foreach ( $dirs as $dir ) {
			$path = X_DIR_THEME . "/$dir/config.xml";
			if ( ! file_exists($path) ) continue;
			$theme_config = load_xml( $path );
			if ( empty($theme_config['name']) ) continue;
			$theme_config['dir'] = $dir;
			$_theme_list[] = $theme_config;
		}
	}
	
	reset( $_theme_list );
}

/**
 * @code
	$themes = get_themes();
 * @endcode
 */
function get_themes()
{
	global $_theme_list;
	reset_theme();
	return $_theme_list;
}

function next_theme()
{
	global $_theme_list, $_theme_list_current;
	$current = current( $_theme_list );
	next( $_theme_list );
	$_theme_list_current = $current;
	return $_theme_list_current;
}
/** @short alias of next_theme();
 *
 */
function get_theme()
{
	return next_theme();
}

function get_theme_element($key)
{
	global $_theme_list_current;
	if ( $_theme_list_current === false ) return null;
	else return $_theme_list_current[$key];
}

function theme_name()
{
	$name = get_theme_element('name');
	return $name[L];
}
function theme_type()
{
	return get_theme_element('type');
}
function theme_dir()
{
	return get_theme_element('dir');
}
function theme_count()
{
	global $_theme_list_current;
	if ( ! isset($_theme_list_current) ) reset_theme();
	return count($_theme_list_current);
}




// -------------------------
/** @short returns the record of the site in x_site_config
 *
 @code
 $site = site_get( $in['idx'] );
 @endcode
 */
function site_get( $mixed )
{
	return x::site( $mixed );
}

function site_delete( $mixed )
{
	return x::site_delete( $mixed );
}


function site_set( $idx, $domain, $mb_id=null )
{
	return x::site_set( $idx, $domain, $mb_id );
}

/** @see x::meta_set() */
function meta_set( $key, $code, $value=null )
{
	return x::meta_set( $key, $code, $value );
}

function meta_get( $key, $code=null )
{
	return x::meta_get( $key, $code );
}

function meta($code, $value='_NULL_CAN_BE_SAVED_', $third_value=null)
{
	return x::meta( $code, $value, $third_value );
}


function meta_delete( $key, $code=null )
{
	return x::meta_delete( $key, $code );
}




/** @short returns the site menu list in array.
 *
 *
 *
 */
function get_site_menu()
{
	return x::menus();
}



function sites( $mb_id )
{
	return x::sites( $mb_id );
}


function site_url( $domain )
{
	return x::site_url( $domain );
}

function site_title ( $domain )
{
	return meta_get( $domain, 'title' );
}


/**
 *  @brief function layer for preparing different system.
 *  
 *  @param [in] $field field of a member table ( information )
 *  @return value of the field
 *  
 *  @details use this function to get the login user information
 */
function my( $field = 'id' ) {
	global $member;
	switch ( $field ) {
		case 'id'				: $field = 'mb_id';			break;
		case 'name'				: $field = 'mb_nick';		break;
		default				:							break;
	}
	return $member[ $field ];
}


function bo_table($n, $domain=null)
{
	return g::bo_table( $n, $domain );
}




/**
 *
 */
function url_site_config($domain=null)
{
	return url_site_admin($domain);
}

function url_forum_list( $id )
{
	return g::url_forum_list($id);
}
function url_forum_read( $bo_id, $wr_id )
{
	return g::url()."/bbs/board.php?bo_table=$bo_id&wr_id=$wr_id";
}

function url_x_admin()
{
	return g::url() . "/?module=admin&action=index";
}
function url_site_admin($domain=null, $module='site', $action='config_first_page')
{
	if ( empty($domain) ) return g::url() . "/?module=$module&action=$action";
	else return site_url( $domain ) . "/x/?module=$module&action=$action";
}


function url_language_setting()
{
	return g::url() . '/?module=member&action=setting';
}

function url_login()
{
	return g::url() . '/bbs/bbs/login.php';
}


function index_page() {
	return strpos($_SERVER['PHP_SELF'], '/index.php') !== false;
}
function g_index_page() {
	if ( strpos($_SERVER['PHP_SELF'], '/x/index.php') !== false ) return false;
	return strpos($_SERVER['PHP_SELF'], '/index.php') !== false;
}
function x_index_page() {
	return strpos($_SERVER['PHP_SELF'], '/x/index.php') !== false;
}


function login_page() {
	return strpos($_SERVER['PHP_SELF'], 'login.php') !== false;
}


function register_page() {
	return strpos($_SERVER['PHP_SELF'], 'register.php') !== false;
}


function member_confirm_page() {
	return strpos($_SERVER['PHP_SELF'], 'member_confirm.php') !== false;
}

function password_page() {
	return strpos($_SERVER['PHP_SELF'], 'password.php') !== false;
}


function board_page() {
	return strpos($_SERVER['PHP_SELF'], 'board.php') !== false;
}





/**
 *  @brief checks admin permission
 *
 *  @return true if the user has admin permission.
 *  
 *  @details it always return true if the login user is super admin.
	it returns true if the user is a site admin and if the user is accessing his site.
	
	Use this function to check if the user is super admin or site admin.
 */
function admin()
{
	if ( ! login() ) return false;
	global $is_admin;
	if ( $is_admin == 'super' ) return true;
	else {
		$site = x::site();
		if ( $site['mb_id'] == my('id') ) return true;
	}
	return false;
}


/** @short returns true if the login user is super admin
 *
 *
 */
function super_admin()
{
	global $is_admin;
	return $is_admin == 'super';
}



function share( $script )
{
	return x::dir() . "/etc/share/$script.php";
}

function page( $page )
{
	return g::url() . "?page=$page";
}



function config( $code, $value=null )
{
	return x::config( $code, $value );
}


/**@short returns path a script under the current module folder
 *
 * @code
		include_once module('forum_setting');
	@endcode
 */
function module($file,$url=false)
{
	return etc::module($file,$url);
}

