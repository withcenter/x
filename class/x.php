<?php
include_once "gnuboard.php";

/**
 *  @file class/x.php
 *  
 *  @brief GNUBoard Extended Library
 *  그누보드 확장 팩 라이브러리
 *  
 */
class x extends gnuboard
{

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
	 *  @brief Returns the accessed domain. and make it fit for X.
	 *  
	 *  @return string domain
	 *  
	 *  @details Use this function to get the accessed domain.
	 *  @waring If the domain is BASE-DOMAIN, it returns the domain adding 'www.' on the begining.
	 *  ex) "abc.com" will be return "www.abc.com"
	 
	 
	 */
	static function domain()
	{
		$host = $_SERVER['HTTP_HOST'];
		$host = strtolower($host);
		
	
		/// @warning if it's base-domain, it adds 'www.' on the begining.
		if ( $host == etc::base_domain($host) ) return "www.$host";
		else return $host;
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
		if ( G5_IS_MOBILE ) {
			$theme = meta('mobile_theme');
			if ( empty( $theme ) ) $theme = "mobile-community-1";
		}
		else {
			$theme = x::meta_get( 'theme' );
			if ( empty( $theme ) ) $theme = x::meta_get( '.' . etc::domain(), 'theme' );
			if ( empty( $theme ) ) {
				$parts = explode('.', etc::domain());
				for ( $i = 0; $i < count($parts); $i ++ ) {
					array_shift( $parts );
					$domain = '.' . implode('.', $parts);
					$theme = x::meta_get( $domain, 'theme' );
					if ( $theme ) break;
				}
				if ( empty($theme) ) $theme = x::meta_get( '.', 'theme' );
			}
		}
		
		$member_skin = self::meta_get( 'member_skin' );
		if ( empty( $member_skin ) ) $member_skin = 'basic';

		
		/// https://docs.google.com/a/withcenter.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/edit#heading=h.guap7pu1ye1s
		if ( ! is_file( x::dir() . '/theme/' . $theme . '/config.xml' ) ) $theme = 'default';
		
		
		self::$config['site']['theme'] = $theme;
		self::$config['site']['member_skin'] = $member_skin;
		
		
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
	 * @short set/get config value for X ( whole system )
	 * @note it saves key/value pair into a table.
	 * @details use this function when you need to save simple key/value pair informaton.
	 * This function only uses 'code' and 'value' fields in x_config table. so it only applies to the whole system.
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
		return g::bo_table( 0, $domain );
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
	 *
	 * @note to get forum ids only, then use forum_ids()
	 */
	static function forums($domain=null)
	{
		global $g5;
		
		
		
		$bo_table = bo_table( 0, $domain );
		
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
	 *  @param [in] $o options
	 *  @return null
	 *  
	 *  @details use this function to insert a post into x_post_data
	 */
	static function post_data_insert( $o ) {
		$o['wr_content'] = strip_tags($o['wr_content']);
		$sql = "insert into x_post_data
                set
					domain					= '$o[domain]',
					bo_table					= '$o[bo_table]',
					wr_id						= '$o[wr_id]',
					wr_parent				= '$o[wr_parent]',
					wr_is_comment		= '$o[wr_is_comment]',
					wr_comment			= '$o[wr_comment]',
					wr_option					= '$o[wr_option]',
					ca_name					= '$o[ca_name]',
					wr_subject				= '$o[wr_subject]',
					wr_content				= '$o[wr_content]',
					mb_id						= '$o[mb_id]',
					wr_name					= '$o[wr_name]',
					wr_datetime				= '$o[wr_datetime]',
					wr_hit						= 0,
					wr_good					= 0,
					wr_nogood				= 0,
					wr_num = '$o[wr_num]',
                     wr_reply = '$o[wr_reply]',
                 
                     wr_link1 = '$o[wr_link1]',
                     wr_link2 = '$o[wr_link2]',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
					 
                     wr_password = '$o[wr_password]',

                     wr_email = '$o[wr_email]',
                     wr_homepage = '$o[wr_homepage]',
    
                     wr_last = '$o[wr_last]',
                     wr_ip = '$o[wr_ip]',
                     wr_1 = '$o[wr_1]',
                     wr_2 = '$o[wr_2]',
                     wr_3 = '$o[wr_3]',
                     wr_4 = '$o[wr_4]',
                     wr_5 = '$o[wr_5]',
                     wr_6 = '$o[wr_6]',
                     wr_7 = '$o[wr_7]',
                     wr_8 = '$o[wr_8]',
                     wr_9 = '$o[wr_9]',
                     wr_10 = '$o[wr_10]',
					 
					 
					 wr_file = '$o[wr_file]'
				";
		db::query($sql);
	}
	
	/**@short updates a post in x_post_data
	 *
	 *
	 * @note integer fields are set without quote('), so you can use express on value like "wr_comment = wr_comment + 1"
	 *
	 */
	static function post_data_update( $o )
	{
		if ( empty($o['bo_table']) || empty($o['wr_id']) ) return -1;
		
		$f = array();
		
				if ( isset( $o['wr_comment'] ) )	$f[]				= "wr_comment=$o[wr_comment]";
				if ( isset( $o['wr_option'] ) )		$f[]				= "wr_option='$o[wr_option]'";
				if ( isset( $o['ca_name'] ) )		$f[]				= "ca_name='$o[ca_name]'";
				if ( isset( $o['wr_subject'] ) ) 	$f[]				= "wr_subject='$o[wr_subject]'";
				if ( isset( $o['wr_content'] ) ) 	$f[]				= "wr_content='$o[wr_content]'";
				if ( isset( $o['mb_id'] ) ) 			$f[]				= "mb_id='$o[mb_id]'";
				if ( isset( $o['wr_name'] ) ) 		$f[]				= "wr_name='$o[wr_name]'";
				if ( isset( $o['wr_hit'] ) ) 			$f[]				= "wr_hit=$o[wr_hit]";
				if ( isset( $o['wr_good'] ) ) 		$f[]				= "wr_good=$o[wr_good]";
				if ( isset( $o['wr_nogood'] ) ) 	$f[]				= "wr_nogood=$o[wr_nogood]";
				
				if ( isset( $o['wr_num'] ) ) 	$f[]				= "wr_num = '$o[wr_num]'";
				if ( isset( $o['wr_reply'] ) ) 	$f[]				= "wr_reply = '$o[wr_reply]'";
				if ( isset( $o['wr_link1'] ) ) 	$f[]				= "wr_link1 = '$o[wr_link1]'";
				if ( isset( $o['wr_link2'] ) ) 	$f[]				= "wr_link2 = '$o[wr_link2]'";
				if ( isset( $o['wr_link1_hit'] ) ) 	$f[]				= "wr_link1_hit = '$o[wr_link1_hit]'";
				if ( isset( $o['wr_link2_hit'] ) ) 	$f[]				= "wr_link2_hit = '$o[wr_link2_hit]'";
				if ( isset( $o['wr_password'] ) ) 	$f[]				= "wr_password = '$o[wr_password]'";
				if ( isset( $o['wr_email'] ) ) 	$f[]				= "wr_email = '$o[wr_email]'";
				if ( isset( $o['wr_homepage'] ) ) 	$f[]				= "wr_homepage = '$o[wr_homepage]'";
				if ( isset( $o['wr_last'] ) ) 	$f[]				= "wr_last = '$o[wr_last]'";
				if ( isset( $o['wr_ip'] ) ) 	$f[]				= "wr_ip = '$o[wr_ip]'";
				
				for( $i=1; $i<=10; $i++ ) {
					if ( isset( $o["wr_$i"] ) ) 	$f[]				= "wr_$i = '" . $o["wr_$i"] . "'";
				}
				
				
				if ( isset( $o['wr_file'] ) ) 	$f[]				= "wr_file = '$o[wr_file]'";
		
		$q = "UPDATE x_post_data  SET ";
		$q .= implode( ', ', $f);
		$q .= " WHERE bo_table='$o[bo_table]' AND wr_id=$o[wr_id]";
		db::query($q);
	}
	
	
	/** @short deletes a post in x_post_data
	 *
	 * @note use this function to delete a post and only that post.
	 *				If you want to delete all the post in a thread including post and its comments, then use post_data_delete_thread()
	 * @code
			// delete post
			x::post_data_delete( $bo_table, $write['wr_id'] );
			
			// delete post and its comments
			x::post_data_delete_thread( $bo_table, $write['wr_id'] );
	
	 * @endcode
	 *
	 */
	static function post_data_delete( $bo_table, $wr_id ) {
		db::query("DELETE FROM x_post_data WHERE bo_table='$bo_table' AND wr_id=$wr_id");
	}
	
		
	/** @short deletes a post and all of tis comments in x_post_data
	 *
	 *
	 */
	static function post_data_delete_thread( $bo_table, $wr_id ) {
		db::query("DELETE FROM x_post_data WHERE bo_table='$bo_table' AND wr_parent=$wr_id");
	}
	
	
	/** @short returns only one(1) record of site in array.
	 *
	 * @param [in] $mixed if it is numeric, then the value is 'idx' or else the value is domain. 
	 * @code
		if ( x::site( $site['domain'] ) ) x::site_delete( $site['domain'] );
	 * @endcode
	 * @note if you needs to get more than one record, use sites()
	 */
	static function site( $mixed=null )
	{
		if ( empty( $mixed ) ) $mixed = etc::domain();
		if ( is_numeric($mixed) ) $qw = "idx=$mixed";
		else $qw = "domain='$mixed'";
		$q = "SELECT * FROM x_site_config WHERE $qw";
		return db::row( $q );
	}
	/** @short delete a site
	 *
	 *
	 * @code delete by domain
			if ( x::site( $site['domain'] ) ) x::site_delete( $site['domain'] );
		@endcode
		@code delete by idx
			$site = site_delete( $in['idx'] );
		@endcode
		
	 */
	static function site_delete ( $mixed )
	{
		if ( is_numeric($mixed) ) $qw = "idx=$mixed";
		else $qw = "domain='$mixed'";
		return db::query( "DELETE FROM x_site_config WHERE $qw");
	}
	
	/**
		@code
			return x::site_set( $idx, $domain, $mb_id );
			site_set( $in['idx'], $domain, $mb_id );
		@endcod
	 */
	static function site_set( $idx, $domain, $mb_id=null ) {
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
	 *  @brief create a new sub-site.
	 *  
	 *  @param [in] $o contains optional values for creating a new site.
	 *  @return int returns 0 on sucess. otherwise the return value will not be 0.
	 *  
	 *  @details To create a sub-site
	 *  <ol>
	 *  	<li> if 'multisite' board group does not exists, create it first ( It is done automatically when user creates the first sub-site )
	 *  	<li> creates sub-site ( by inserting configuration value into a record to x_multisite_config table )
	 *  	<li> creates 'board' (forum) for the site and sets default setting.
	 *  </ol>
	 *  
	 */
	static function site_create($o)
	{
		global $member;
		
		if ( ! g::group_exist('multisite') ) g::group_create(array('id'=>'multisite', 'subject'=>'multisite')); /* creating 'multisite' board group */
		if ( self::site($o['domain']) ) return MS_EXIST;

		
		self::site_set( $o['domain'], $o['domain'], $member['mb_id'] );
		self::meta_set( $o['domain'], 'title', $o['title'] );
		return  0;
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
	
	
	/**
	 *  @brief returns the url of a site. 사이트 URL 주소를 리턴한다.
	 *  
	 *  @param [in] $domain domain of the site. 도메인
	 *  @return string URL
	 *  
	 *  @details
	 *  returns the url of sub-site. It supports sub-folder installation.
	 *  
	 *  도메인을 입력받아서 멀티 사이트의 주소를 리턴한다.
	 *  그누보드가 도메인 최상위 폴더가 아니라 서브 폴더에 설치된 경우를 지원한다.
	 *  
	 *  Example) http://work.org/g5-5.0b17-2/
	 */
	static function site_url($domain)
	{
		return self::url_site( $domain );
	}
	
	static function url_site($domain)
	{
		
		$url = g::url();
		$pu = parse_url( $url );
		return str_replace( $pu['host'], $domain, $url );
	}
	
	
	
	
	/**
	 *  @brief returns login user's sites
	 *  
	 *  @return array list of login user's sites.
	 *  
	 *  @details simply returns all the records of user's site.
	 */	
	static function sites( $mb_id )
	{
		return db::rows("SELECT * FROM x_site_config WHERE mb_id='$mb_id'");
	}
	
	
	/**
	 *  @brief returns the number of login user's site.
	 *
	 *
	 */
	static function count_site( $id )
	{
		return db::result( "SELECT COUNT(*) FROM x_site_config WHERE mb_id='$id'");
	}
	static function site_count( $id )
	{
		return self::count_site( $id );
	}
	
	


	/**
	 *  @brief sets the site title in browser title bar.
	 *  
	 *  @return empty
	 *  
	 *  @details changes the site title by setting g5 variable.
	 */
	static function set_title( ) {
		global $g5, $config;
		
		$title = meta( 'title');
		$secondary_title = meta('secondary_title');
		
		if ( !$title ) $title = 'Welcome';
		if ( !$secondary_title ) $secondary_title = etc::domain();
		
		$g5['title'] = $title;
		$config['cf_title'] = $secondary_title;
	}
	
	
	
	static function url_config_forum( $id=null ) {
		if ( empty($id) ) $id = $GLOBALS['bo_table'];
		return x::url() . "?module=site&action=config_forum&mode=forum_setting&bo_table=$id";
	}
	
	
	static function menus($m=null)
	{
		$menus = array();
		for ( $i = 1; $i <= MAX_MENU; $i++ ) {
			$url			= meta_get( self::menu_id($i, $m) ); // "menu{$i}bo_table";
			
			if ( empty($url) ) continue;
			$name	= self::menu_name($i, $m); // meta_get("menu{$i}name");
			
			if ( empty($name) && self::menu_type($url) == 'forum_id' ) {
				$cfg = g::config($url);
				if ( empty($cfg['bo_subject']) ) $name = ln("No Subject", "제목없음");
				else $name = $cfg['bo_subject'];
			}
			if ( empty($name) ) continue;
			$target			= meta_get("menu$m{$i}target");
			$menus[] = array('url'=>$url,'name'=>$name, 'target'=>$target);
		}
		/// default menu on main menu only.
		if ( empty($m) && empty($menus) ) {
			$menus[]			= array('url'=>'default', 'name'=>ln("Please", "관리자"));
			$menus[]			= array('url'=>'fake-id-1', 'name'=>ln("config", "페이지에서"));
			$menus[]			= array('url'=>'fake-id-2', 'name'=>ln("menu", "메뉴를"));
			$menus[]			= array('url'=>'fake-id-3', 'name'=>ln("in admin", "설정"));
			$menus[]			= array('url'=>'fake-id-4', 'name'=>ln("page", "하세요"));
		}
		return $menus;
	}
	
	
	/** @short returns menu links in array.
	 *
	 * @code how to use with UL, LI tags.
		<ul>
			<?="<li>" . implode( "</li><li>", x::menu_links() ) . "</li>"?>
		</ul>
	 * @code
	 */
	static function menu_links($m=null)
	{
		$menus = self::menus($m);
		$arr = array();
		foreach ( $menus as $menu ) {
			$url		= self::menu_url($menu['url']);
			$target	= self::menu_target_attr($menu['target']);
			$arr[]	= "<a href='$url'$target>$menu[name]</a>";
		}
		return $arr;
	}
	
	static function menu_link($m=null)
	{
		return implode( "\n", self::menu_links($m) );
	}
	
	
	/** @short returns the url of the menu
	 *
	 * @see #menu url
	 *
	 */
	static function menu_url( $url )
	{
		if ( strpos($url, "http") === 0 ) return $url;
		else if ( $url[0] == '.' || $url[0] == '/' || $url[0] == '?' || $url[0] == '#' ) return $url;
		else if ( $url == 'URL_HOME' ) return g::url();
		return url_forum_list( $url );
	}
	
	/** @returns the menu url type.
	 *
	 * @return
					'url'				- if the $url is entered as normal URL ( homepage address )
					'forum_id'		- if the $url is forum id.
					null				- if $url is empty.
	 * @coe
		<option value=''<? if ( x::menu_type( x::menu( $i ) ) == 'url' ) echo " selected=true";?>>직접 URL 입력</option>
	    @endcode
	 */
	static function menu_type( $url ) {
		if ( empty($url) ) return null;
		else if ( $url == self::menu_url( $url ) ) return 'url';
		else return 'forum_id';
	}
	
	
	/** @short returns value of menu.
	 *
	 *
	 */
	static function menu( $n, $m=null )
	{
		return self::meta( self::menu_id( $n, $m ) );
	}
	
	/** @short returns menu id of menu
	 *
	 * There is a mal-structured in menu.
	 * the keyword 'bo_table' should be replaced with 'id'.
	 */
	static function menu_id( $n, $m=null )
	{
		return "menu$m{$n}bo_table";
	}
	
	
	/** @short return the name of the menu
	 *
	 *
		@code
			x::menu_name( 1, 'left' ); // will returns the first name of left menu.
		@endcode
	 */
	static function menu_name( $n, $m=null )
	{
		return x::meta("menu$m{$n}name");
	}
	
	
	/** @short return the target of the menu
	 *
	 *
		@code
			x::menu_target( 1, 'left' ); // will returns the first target of left menu.
		@endcode
	 */
	static function menu_target( $n, $m=null )
	{
		return x::meta("menu$m{$n}target");
	}
	
	
	static function menu_target_attr( $Y )
	{
		if ( $Y == 'Y' ) return " target='_blank'";
		else return null;
	}
	
	
	
	/**
	 *  @brief returns a record of x_data.
	 *  
	 *  @param [in] $first first category
	 *  @param [in] $second second category
	 *  @param [in] $third third category
	 *  @return array of a record
	 *  
	 *  @details use this function to get a record of x_post
	 */
	static function data( $first, $second, $third )
	{
		return db::row("SELECT * FROM x_data WHERE `first`='$first' AND `second`='$second' AND `third`='$third'");
	}
	
	/**
	 *  @brief returns 'idx' of a record.
	 *  
	 *  @param [in] $first first
	 *  @param [in] $second second
	 *  @param [in] $third third
	 *  @return int 'idx'
	 *  
	 *  @details use this function to get an idx of a record.
	 */
	static function data_idx( $first, $second, $third )
	{
		return db::result("SELECT idx FROM x_data WHERE `first`='$first' AND `second`='$second' AND `third`='$third'");
	}
	/**
	 *  @brief inserts/updates a record of x_data
	 *  
	 *  @param [in] $o option
	 *  @return empty
	 *  
	 *  @details insert or updates a record.
	 */
	static function data_update( $o )
	{
		$idx = self::data_idx( $o['first'], $o['second'], $o['third'] );
		if ( $idx ) {
			$cond = array( 'first'=>$o['first'], 'second'=>$o['second'], 'third'=>$o['third'] );
			unset( $o['first'], $o['second'], $o['third'] );
			db::update( 'x_data', $o, $cond );
			return 1;
		}
		else {
			if ( empty($o['stamp_create']) ) $o['stamp_create'] = time();
			if ( empty($o['stamp_update']) ) $o['stamp_update'] = time();
			if ( empty($o['ip']) ) $o['ip'] = etc::client_ip();
			db::insert( 'x_data', $o );
			return 2;
		}
	}
	
	
	/**
	 *  @brief returns only 'WHERE' part of SQL query.
	 *  @details use this function to get only where clause including 'WHERE' instruction.
	 *
	 */
	static function data_where( $o )
	{
		return sql::where( $o );
	}
	
	
	/**
	@code
		$re = x::data_gets(
			array(
				'first'		=> 'source',
				'second'	=> 'theme'
			)
		);
		di( $re );
	@endcode
	*/
	static function data_gets( $o )
	{
		$o['table'] = 'x_data';
		return db::rows( sql::query( $o ) );	
	}
	
	static function data_get( $o )
	{
		$o['limit'] = '1';
		$rows = self::data_gets( $o );
		return $rows[0];
	}
	
	
	/**
	@code
		$re = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'theme'
		)
	);
	di( $re );
	@endcode
	*/
	static function data_count( $o, $ret=false )
	{
		$o['table'] = 'x_data';
		if ( $ret ) return sql::query_count( $o );
		return db::result( sql::query_count( $o ) );
	}
	
	static function data_delete( $idx )
	{
		db::query("DELETE FROM x_data WHERE idx=$idx");
	}
	
	
	
	
	
}
