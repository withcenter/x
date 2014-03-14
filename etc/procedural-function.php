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
			$path = X_DIR_THEME . "/$dir/config.php";
			if ( ! file_exists($path) ) continue;
			$theme_config = array();
			include $path;
			if ( empty($theme_config['name']) ) continue;
			$theme_config['dir'] = $dir;
			$_theme_list[] = $theme_config;
		}
	}
	reset( $_theme_list );
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
	return get_theme_element('name');
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

function meta( $key, $code=null )
{
	return x::meta_get( $key, $code );
}


function meta_delete( $key, $code=null )
{
	return x::meta_delete( $key, $code );
}




/** @short returns the site menu list in array.
 *
 *
 * @code
	<?
		$menus = get_site_menu();
		foreach ( $menus as $menu ) {
	?>
			<a  href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$menu['bo_table']?>'><?=$menu['name']?></a>
	<? } ?>
 * @endcode
 * @code
		<ul id="menu">
			<?
				$menus = get_site_menu();
				foreach ( $menus as $menu ) {
					echo "<li class='comm3_menu'><a href='".url_forum_list($menu['bo_table'])."'>$menu[name]</a></li>";
				}
				if ( admin() ) {
			?>
					<li class="comm3_menu" page = "admin-menu">
						<a href="<?=url_site_config()?>">사이트 관리</a>
					</li>
			<? } ?>
		</ul>
 * @endcode
 */
function get_site_menu()
{
	$menus = array();
	for ( $i = 1; $i <= MAX_MENU; $i++ ) {
		$bo_key		= "menu{$i}bo_table";
		$bo_id			= meta_get( $bo_key );
		if ( empty($bo_id) ) continue;
		$bo_name	= meta_get("menu{$i}name");
		if ( empty($bo_name) ) {
			$cfg = g::config($bo_id);
			if ( empty($cfg['bo_subject']) ) $bo_name = ln("No Subject", "제목없음");
			else $bo_name = $cfg['bo_subject'];
		}
		$menus[] = array('bo_table'=>$bo_id,'name'=>$bo_name);
	}
	if ( empty($menus) ) {
		$menus[]			= array('bo_table'=>'default', 'name'=>ln("Please", "관리자"));
		$menus[]			= array('bo_table'=>'fake-id-1', 'name'=>ln("config", "페이지에서"));
		$menus[]			= array('bo_table'=>'fake-id-2', 'name'=>ln("menu", "메뉴를"));
		$menus[]			= array('bo_table'=>'fake-id-3', 'name'=>ln("in admin", "설정"));
		$menus[]			= array('bo_table'=>'fake-id-4', 'name'=>ln("page", "하세요"));
	}
	return $menus;
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


/** @short return the bo_table of n'th menu
 *
 * @param [in] $n
 *
 * @return string bo_table
 *
 * @code
	bo_table(1); // is same as meta('menu_1', ms::board_id(etc::domain()).'_1')
 * @endcode
 */
function bo_table($n, $domain=null)
{
	if ( empty($domain) ) $domain = etc::domain();
	$bo_table = "ms_" . etc::last_domain( $domain ) . '_'.$n;
	return $bo_table;
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
	return x::url() . "/?module=admin&action=index";
}
function url_site_admin($domain=null, $module='multi', $action='config_first_page')
{
	if ( empty($domain) ) return x::url() . "/?module=$module&action=$action";
	else return site_url( $domain ) . "/x/?module=$module&action=$action";
}



function login_page() {
	return strpos($_SERVER['PHP_SELF'], 'login.php') !== false;
}



function member_confirm_page() {
	return strpos($_SERVER['PHP_SELF'], 'member_confirm.php') !== false;
}



