<?php



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
	 *  @code to get theme
			x::theme();
		 @endcode
		 
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
	
	static function site_type()
	{
		return self::$config['site']['type'];
	}
	static function multisite()
	{
		return self::site_type() == 'multisite';
	}
	
	/** @short loads(finds) the site information of the domain.
	 * @note site information is like the theme name of the connected domain
	 *
	 * https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit?pli=1#heading=h.1upwyuqn84q1
	 * @note theme will be available at this point.
	 */
	static function load_site()
	{
		/*
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
		*/

		$theme = meta_get( 'theme' );
		if ( empty( $theme ) ) {
			$parts = explode('.', etc::domain());
			array_shift( $parts );
			$domain = '.' . implode('.', $parts);
			$theme = meta_get( $domain, 'theme' );
			if ( empty( $theme ) ) {
				$parts = explode('.', etc::domain());
				array_shift( $parts );
				array_shift( $parts );
				$domain = '.' . implode('.', $parts);
				$theme = meta_get( $domain, 'theme' );
				if ( empty( $theme ) ) $theme = 'default';
			}
		}
		self::$config['site']['theme'] = $theme;
		// @deprecated. no more site type is used.
		self::$config['site']['type'] = null;
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
	 *  @brief get or set meata data.
	 *  
	 *  @param [in] $code 'code' or 'key'
	 *  @param [in] $value 'value' or 'code'
	 *	 @param [in] $value
	 *  @note null can be saved as in value.
	 
	 *  @return empty
	 *  @warning when you get data,  cannot use 'key'. Use 'meta_get()' to use key.
						to save using 'key', 'code' and 'value', you can use meta()
						but to get 'value' using 'key' and 'code', you must use meta_get()
	 *
	 *  @waring use meta_get(), meta_set() for clear understand.
	 *
	 *  @details This function does memory cache. So how many times you call this function, it will only access to data base one time in the first.
	 *  @note
						if there are there parametas (which means if all parametas are passed), then it will INSERT/UPDATE value of 'key' and 'code'
						If there are two parametas only ( code and value ), then it will INSERT/UPDATE the value of the 'code' with the KEY OF DOMAIN. DOMAIN is AUTOMTICALLY chosen
						if there is only one parametas, then it gets 'value' of the code with the acccessed DOMAIN ( KEY )
	 *  @code
						/// simple usage
						x::meta('code','value to save');					/// set
						echo x::meta('code');									/// get

						
						x::meta('key','code','No. 2 : value to save');	/// set
						echo x::meta_get('key', 'code');						/// get

						x::meta_set('key3', 'code', '<br>No.3 : value to save');		/// set
						echo x::meta_get( 'key3', 'code' );										/// get

						/// use x::config() if you want to not use 'key'.
						x::config('only code', 'without key');
						echo x::config('only code');
	 *  @endcode
	 */
	static function meta($code, $value='_NULL_CAN_BE_SAVED_', $third_value=null)
	{
		
		
		
		
		if ( $value == '_NULL_CAN_BE_SAVED_' ) {
			return self::meta_get(etc::domain(), $code);
		}
		else {
			return self::meta_set( $code, $value, $third_value );
		}
	}
	/**
	 * @note if only one parameta is passed, then it automatically adds 'domain' as its key.
	 *
	 */
	static function meta_get($key, $code=null)
	{
		global $_meta;
		if ( empty($code) ) {
			$code = $key;
			$key = etc::domain();
		}
		$k = "$key.$code";
		if ( ! isset($_meta[$k]) ) {
			$_meta[$k] = db::result("SELECT `value` FROM x_config WHERE `key`='$key' AND code='$code'");
		}
		return $_meta[$k];
	}
	
	/**
	 *
	 *
	 * @short deletes a record in x_config.
	 * @param [in] $key is the domain or code.
	 * @param [in] $code is the code. if it is empty, the value of $key will be used as $code and the value of $key will be replaced into the access domain
	 *
	 */
	 
	static function meta_delete($key, $code=null)
	{
		if ( empty($code) ) {
			$code = $key;
			$key = etc::domain();
		}
		db::query("DELETE FROM x_config WHERE `key`='$key' AND code='$code'");
	}
	/**
	 * @note if only two parametas are passed, then it automatically adds 'domain' as its key.
	 *
	 */
	static function meta_set( $key, $code, $value=null )
	{
		if ( empty($value) ) {
			$value			= $code;
			$code			= $key;
			$key				= etc::domain();
		}
		
		
			$q = "SELECT code FROM x_config WHERE `key`='$key' AND code='$code'";
			$v = db::result($q);
			if ( $v ) {
				db::update('x_config', array('value'=>$value), array('key'=>$key, 'code'=>$code) );
			}
			else {
				db::insert('x_config', array('key'=>$key, 'code'=>$code, 'value'=>$value) );
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
	
	
	/** 
	 *
	 *  @brief returns forum ID
	 *  사이트의 게시판 아이디를 리턴한다.
	 *  
	 *  @param [in] $domain
	 *  sub-site domain
	 *  사이트 도메인
	 *  @return string
	 *  forum ID
	 *  게시판 아이디
	 *  
	 *  @details
	 *  	returns forum id like "ms_[domain]"
	 *  	게시판 아이디 형식은 "ms_[도메인]" 이다.
	 *  @code
	 *  <?=g::url_board(x::board_id(etc::domain()))?>
	 *  @endcode
	 */
	static function board_id( $domain=null )
	{
		if ( empty($domain) ) $domain = etc::domain();
		return 'ms_' . etc::last_domain($domain);
	}
	
	
	/**
	 *  @brief returns the number of forum of the site (multisite or multidomain).
	 *  
	 *  @return int
	 *  
	 *  @details Use this function to count the number of forums of a sub-site.
	 */
	static function count_forum($domain=null)
	{
		global $g5;
		if ( empty($domain) ) $domain = etc::domain();
		$qb = "bo_table LIKE '" . self::board_id( $domain ) . "\_%'";
		$q = "SELECT COUNT(*) FROM $g5[board_table] WHERE $qb";
		return db::result($q);
	}
	static function forum_count( $domain=null ) {
		return self::count_forum($domain);
	}
	
	
	/** @short returns all the forum record(information) of the domain( subsite )
	 *
	 * @param $domain if omitted, then it uses current accessed domain.
	 * @return array all the board table record of the domain.
	 */
	static function forums($domain=null)
	{
		global $g5;
		if ( $domain === null ) $domain = etc::domain();
		$bo_table = self::board_id( $domain );
		$qb = "bo_table LIKE '$bo_table\_%'";	
		$rows = db::rows( "SELECT * FROM $g5[board_table] WHERE $qb");
		return $rows;
	}
	
	
	/**
	 *  @brief returns all the forum id(s) and ID only.
	 *  
	 *  @param [in] $domain is the domain (or subdomain of subsite)
	 *  @return array of forum id(bo_table)
	 *  
	 *  @details use this function to get all the forum id.
	 */
	static function forum_ids( $domain=null )
	{
		$rows = self::forums($domain);
		$ret = array();
		if ( $rows ) {
			foreach ( $rows as $row ) {
				$ret[] = $row['bo_table'];
			}
		}
		return $ret;
	}
	
	/**
	 *
	 * @short returns members of a domain.
	 *
	 */
	static function members($domain)
	{
		global $g5;

		$q = "SELECT * FROM $g5[member_table] WHERE ".REGISTERED_DOMAIN."='$domain'";
		return db::rows( $q );
	}
	
	
	static function path_multi_upload($dir=null)
	{
		if ( $dir ) $dir .= '/';
		return G5_DATA_PATH . '/upload/multisite/' . $dir;
	}
	
	static function url_multi_upload($dir=null)
	{
		if ( $dir ) $dir .= '/';
		return G5_DATA_URL . '/upload/multisite/' . $dir;
	}
	
	
	
	
	
	static function code_logo()
	{
		return "logo";
	}

	static function path_file($name, $folder=null)
	{
		if ( empty( $folder ) ) $folder = etc::last_domain( etc::domain() );
		return self::path_multi_upload( $folder ) . $name;
	}
	
	static function url_file($name, $folder=null)
	{
		if ( empty( $folder ) ) $folder = etc::last_domain( etc::domain() );
		return self::url_multi_upload( $folder ) . $name;
	}
	
	
	
	
	static function path_logo( $domain=null )
	{
		if ( empty( $domain ) ) $domain = etc::domain();
		return self::path_file( self::code_logo(), etc::last_domain( $domain ) );
	}
	
	static function url_logo( $domain=null )
	{
		if ( empty( $domain ) ) $domain = etc::domain();
		return self::url_file( self::code_logo(), etc::last_domain( $domain ) );
	}
	
	
	/**
	 *  @brief insert post into post_data
	 *  
	 *  @param [in] $o Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details Details
	 */
	static function post_data_insert( $o ) {
		$sql = "insert into x_post_data
                set
					domain					= '$o[domain]',
					bo_table				= '$o[bo_table]',
					wr_id					= '$o[wr_id]',
					wr_comment				= 0,
					ca_name					= '$o[ca_name]',
					wr_subject				= '$o[wr_subject]',
					wr_content				= '$o[wr_content]',
					wr_hit = 0,
					wr_good = 0,
					wr_nogood = 0,
					mb_id					= '$o[mb_id]',
					wr_name					= '$o[wr_name]',
					wr_datetime				= '$o[wr_datetime]'
				";
		db::query($sql);
	}
	
	/** @short returns the record of site in array.
	 *
	 * @param [in] $mixed if it is numeric, then the value is 'idx' or else the value is domain. 
	 * @code
		if ( x::site( $site['domain'] ) ) x::site_delete( $site['domain'] );
	 * @endcode
	 */
	static function site( $mixed )
	{
		if ( is_numeric($mixed) ) $qw = "idx=$mixed";
		else $qw = "domain='$mixed'";
		$q = "SELECT * FROM x_site_config WHERE $qw";
		return db::row( $q );
	}
	/** @short delete a site
	 *
	 *
	 * @code
			if ( x::site( $site['domain'] ) ) x::site_delete( $site['domain'] );
		@endcode
	 */
	static function site_delete ( $domain )
	{
		return db::query( "DELETE FROM x_site_config WHERE domain='$domain'");
	}
	
	/**
		@code
			return x::site_set( $idx, $domain, $mb_id );
			site_set( $in['idx'], $domain, $mb_id );
		@endcod
	 */
	static function site_set( $idx, $domain, $mb_id ) {
		if ( x::site( $idx ) ) {
			db::update( 'x_site_config', array( 'domain'=>$domain, 'mb_id'=>$mb_id ), array('idx'=>$idx) );
			return $idx;
		}
		else {
			db::insert( 'x_site_config', array( 'domain'=>$domain, 'mb_id'=>$mb_id, 'stamp_created'=>time() ) );
			return db::insert_id();
		}
	}
	
	
	
	/**
	 *  @brief returns the total number of one or more forums.
	 *  
	 *  @param [in] $ids mixed. if an array is passed, then it counts all the post of the forums.
	 *  	or else it only counts that forum.
	 *  @param [in] $type string. default null.
	 *  if it is null, then it count all the record(parent & comemnt) of the forums.
	 *  if it is 'parent', then it only count the parent post.
	 *  if it is passed as 'comment', it only count 'comment'.
	 *  @return int
	 *  
	 *  @details use this function to count post or comment.
	 *  @code
	 *  echo "<td align='center'>".x::count_post(x::forum_ids( $site['domain'] ), null )."</td>";
	 *  @endcode
	 */
	static function count_post( $ids, $type=null)
	{
		if ( ! is_array($ids) ) $ids = array($ids);
		$count = 0;
		foreach ( $ids as $id ) {
			$count += g::count_post( $id, $type );
		}
		return $count;
	}
}
