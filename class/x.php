<?php
define('X_DIR_ETC', g::dir() . '/x/etc');
define('X_DIR_THEME', g::dir() . '/x/theme');
define('MAX_BLOG_WRITER', 3);


/**
 *  @file class/x.php
 *  
 *  @brief GNUBoard Extended Library
 *  그누보드 확장 팩 라이브러리
 *  
 */
class x {

	static $config;
	static $hook_list;
	
	
	/**
	 *  @brief return true if 'x' is already installed.
	 *  
	 *  @return boolean
	 *  
	 *  @details use this function to see if 'x' is already installed.
	 */
	static function installed()
	{
		return file_exists( g::dir() . '/extend/x.php' );
	}
	
	/**
	 *  @brief 그누보드 확장 팩 설치 경로. 파일을 액세스 할 수 있는 HDD 경로.
	 *  
	 *  @return string path
	 *  
	 *  @details include() 나 기타 파일 액세스가 필요 할 때 사용한다.
	 */
	static function dir()
	{
		return g::dir() . '/x';
	}
	
	/**
	 *  @brief 그누보드 확장 팩 설치 URL. 웹 브라우저로 액세스 할 수 있는 경로.
	 *  
	 *  @return string URL
	 *  
	 *  @details 웹 브라우저로 접속해야 할 때 이용한다.
	 */
	static function url()
	{
		return g::url() . '/x';
	}
	
	/**
	 *	@brief returns the url of theme
	 *	@code
			<a href="<?php echo G5_URL ?>"><img src='<?=x::url_theme()?>/img/logo.png'></a>
	 *	@endcode
	 */
	static function url_theme( $file = null )
	{
		$dir = self::url() . '/theme/' . self::$config['site']['theme'];
		if ( empty( $file ) ) return $dir;
		else return $dir . '/' . $file;
	}
	

	/**
	 *  @brief alias of url_theme()
	 *  
	 *  @param [in] $file same as url_theme()
	 *  @return same as url_theme()
	 *  @code
			$member_skin_url	= x::theme_url(  );
		@endcode
	 *  @details return url_theme()
	 */	
	static function theme_url($file=null)
	{
		return self::url_theme($file);
	}
	
	
	/**
	 *  @brief return the url of admin page
	 *  
	 *  @return string url
	 *  
	 *  @details Use this function to get the address of admin page.
	 */
	static function url_admin()
	{
		return self::url() . "/?module=admin&action=index";
	}
	
	static function admin_menu()
	{
		return X_DIR_ETC . '/admin_menu.php';
	}
	
	static function url_setting()
	{
		return self::url() . "/?module=member&action=setting";
	}
	
	
	
	
	/**
	 *  @brief hooks upon life cycle
	 *  
	 *  @param [in] $name function name, file name or full path
	 *  @return 
	 *  if it is loading a script, then the return value is a path of hook script
	 *  if is is calling a callback of the hook, then the return value would be HOOK_EXIST or HOOK_NOT_EXIST and if needed, the hook can return values on global variable.
	 *  
	 *  @details 
	 *  if the input $name ends with '.php' extension, then it assumes as a hook script loading.
	 *  or else it assumes it calls a hook.
	 * @note first register, first called.
	 *  @code
	 *  	di( x::hook(__FILE__) );
	 *  	// returns path like "D:/work/www/g5-5.0b18/x/theme/default/head.php"
	 *  @endcode
	 *  @code calling a hook script
	 *  	if ( file_exists( x::hook(__FILE__) ) ) { include x::hook(__FILE__); return; }
	 *  @endcode
	 */
	static function hook( $name )
	{
		if ( strpos($name, '.php') ) {
			$pi = pathinfo($name);
			$name = $pi['basename'];
			return x::dir() . '/theme/' . self::$config['site']['theme'] . '/' . $name;
		}
		else {
			dlog("HOOK: $name");
			if ( self::$hook_list[ $name ] ) {
				foreach ( self::$hook_list[ $name ] as $hook ) {
					$hook($name);
				}
				return HOOK_EXIST;
			}
			return HOOK_NOT_EXIST;
		}
	}
	
	/**
	 *  @brief register hooks
	 *  
	 *  @param [in] $name hook name
	 *  @param [in] $func hook funciton in Anonymous function as closure
	 *  @return empty
	 *  
	 *  @details Details
	 *  @code example of hook registeration. This kind of anonymous function is available after php version 5.3
	 *  x::hook_register('head_begin', function() {
			di("this is first head_begin");
		});
		x::hook_register('head_begin', function() {
			di("this is second head_begin");
		});
	 *	@endcode
	 *	@code
			x::hook_register('tail_begin', function() {
				dlog("first hook for tail_begin on theme/basic/init.php");
			} );
			x::hook_register('tail_begin', function() {
				jsAlert("second hook for tail_begin on theme/basic/init.php");
			} );
	 *	@endcode
	 

	 	
	 */
	static function hook_register( $name, $func )
	{
		self::$hook_list[$name][] = $func;
	}
	
	
	
	/**
	 *  @brief returns the path of the theme file.
	 *  
	 *  @param [in] $file file name to include under the theme folder.
	 *  @return string file path
	 *  
	 *  @details return the path of the file. if the file does not exists, then the caller function may print out error.
	 * 	
	 * 	@code
			<?include x::theme('menu')?>
	 * 	@endcode
	 *
	 *
	 *	@code how to create a page.

		http://work.org/g5-5.0b18-4/?page=opensource
		<?php
			if ( $in['page'] ) include x::theme( $in['page'] );
		?>
		@endcode
	 *
	 */
	static function theme( $file=null )
	{
		if ( empty( $file ) ) return self::$config['site']['theme'];
		$path = self::dir() . '/theme/' . self::$config['site']['theme'] . '/' . $file . '.php';
		
		return $path;
		/*
		if ( file_exists( $path ) ) return $path;
		else return self::path_null();
		*/
	}
	
	/** @short loads(finds) the site information of the domain.
	 * @note site information is like the theme name of the connected domain
	 *
	 * https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.hoh26aiibh8t
	 * @note theme will be available at this point.
	 */
	static function load_site()
	{
		$theme = ms::meta('theme');
		if ( empty($theme) ) {
			$cfg = md::config( etc::domain_name() );
			if ( $cfg['theme'] ) $theme = $cfg['theme'];
			else $theme = 'default';
			$type = 'multidomain';
		}
		else {
			$type = 'multisite';
		}
		self::$config['site']['theme'] = $theme;
		self::$config['site']['type'] = $type;
	}
	
	
	/**
	 * @brief returns the path for theme folder
	 *
	 */
	static function theme_folder()
	{
		return self::dir() . '/theme/' . self::$config['site']['theme'];
	}
	
	
	static function path_null()
	{
		return self::dir() . '/etc/null.php';
	}
	
	/**
	 * @short set/get config value.
	 * @note it saves key/value pair into a table.
	 * @note use this function when you need to save simple key/value pair informaton.
	 *
	 *
	 * @code
			if ( $submit ) {
				x::config("bo_table.$code", $bo_table);
			}
		@endcode
		@code
			<input type='text' name='bo_table' value="<?=x::config("bo_table.$code")?>">
		@endcode
	 */
	static function config($code,$value=null)
	{
		
		if ( $value === null ) {
			return db::result("SELECT `value` FROM x_config WHERE code='$code'");
		}
		else {
			$row = db::row("SELECT * FROM x_config WHERE code='$code'");
			if ( $row['code'] ) {
				db::update( 'x_config', array('value'=>$value), array('code'=>$code) );
			}
			else db::insert( 'x_config', array('code'=>$code, 'value'=>$value) );
		}
	}
	
	/**
	 *  @brief stores the config values that are set in global setting page into self::$config['global']
	 *  
	 *  @return null
	 *  
	 *  @details It loads 'global setting value' 
	 */
	static function load_global_config()
	{
		$v = self::config( 'system_global_setting' );
		if ( empty($v) ) self::$config['global'] = array();
		else self::$config['global'] = string::unscalar( $v );
	}
	
	static function skin_code( $skin_folder, $bo_table ) {
		return "{$skin_folder}-{$bo_table}";
	}
	
}
