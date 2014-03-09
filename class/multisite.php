<?php
define('MS_EXIST', -9200);
define('MS_MAX_FORUM', 20);
class ms extends multisite { }
class multisite {


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
	static function create($o)
	{
		global $member;
		if ( ! g::group_exist('multisite') ) g::group_create(array('id'=>'multisite', 'subject'=>'multisite')); /* creating 'multisite' board group */

		if ( self::exist($o['domain']) ) return MS_EXIST;
		
		
		$time = time();
		$q = "
			INSERT INTO x_multisite_config ( domain, mb_id, stamp_create, title )
			VALUES ( '$o[domain]', '$member[mb_id]', $time, '$o[title]')
		";
		db::query($q);
		return  0;
	}
	/**
	 *  @brief checks if a sub-site exists or not.
	 *  
	 *  @param [in] $domain sub-site domain. i.e) abc.your-domain.com
	 *  @return boolean
	 *  true if the sub-site exists, otherwise false.
	 *  
	 *  @details Use this function to check if a sub-site exist or not. You can use it when a user creates a site.
	 * You can also use this function if the accessed site is a subsite or not.
	 */
	static function exist($domain=null)
	{
		if ( $domain === null ) $domain = etc::domain();
		$info = self::get( $domain );
		if ( $info ) return true;
		else return false;
	}
	
	
	/**
	 *  @brief returns the record of the site(subsite).
	 *  
	 *  @param [in] $domain domain of the sub-site. i.e) abc.your-domain.com
	 *  
	 *  @return assoc-array a record.
	 *  
	 *  @details
	 *		returns the whole record of the input sub-site.
	 *		use this function to get the configuration of the site.
	 * @note this function does memory cache.
	 * @code
			ms::get();
			$site = ms::get(etc::domain());
		@endcode
	 */
	static function get( $domain = null )
	{
		global $multisite_get;
		if ( empty($domain) ) $domain = etc::domain();
		if ( ! isset( $multisite_get[ $domain ] ) ) {		
			if ( is_numeric( $domain ) ) $qf = "idx";
			else $qf = "domain";
			$sql = "SELECT * FROM x_multisite_config WHERE $qf='$domain'";
			$opt =  db::row( $sql );
			if ( empty($opt) ) return array();
			$multisite_get[ $domain ] = $opt;
		}
		return $multisite_get[ $domain ];
	}

	/**
	 *  @brief get or set meata data.
	 *  
	 *  @param [in] $code 'code' or 'domain'
	 *  @param [in] $value 'vlaue' or 'code'
	 *	 @param [in] $value
	 *  @return empty
	 *  @warning when you get data,  cannot use 'domain'. Use 'meta_get()' to use domain.
	 *  @details This function does memory cache. So how many times you call this function, it will only access to data base one time in the first.
	 */
	static function meta($code, $value=null, $third_value=null)
	{
		if ( $third_value ) {
			$domain	= $code;
			$code		= $value;
			$value		= $third_value;
		}
		
		if ( empty($domain) ) $domain = etc::domain();
		
		if ( $value === null ) {
			return self::meta_get($domain, $code);
		}
		else {
			$q = "SELECT code FROM x_multisite_meta WHERE domain='$domain' AND code='$code'";
			$val = db::result($q);
			if ( $val ) {
				db::update('x_multisite_meta', array('value'=>$value), array('domain'=>$domain, 'code'=>$code) );
			}
			else {
				db::insert('x_multisite_meta', array('domain'=>$domain, 'code'=>$code, 'value'=>$value) );
			}
		}
	}
	
	function meta_get($domain, $code)
	{
		global $_meta;
		$k = "$domain.$code";
		if ( ! isset($_meta[$k]) ) {
			$_meta[$k] = db::result("SELECT `value` FROM x_multisite_meta WHERE domain='$domain' AND code='$code'");
		}
		return $_meta[$k];
	}
	
	
	
	
	
	/**
	 * @short returns 'extra' field of the configuration.
	 * @note use this function if you want to get 'extra' field only.
	 */
	static function get_extra( $domain = null )
	{
		$site = ms::get( $domain );
		return $site['extra'];
	}
	
	
	
	
	
	
	
	
	/**
	 *  @brief gets configuration of all sites.
	 *  
	 *  @return array()
	 *  
	 *  @details use this function to get the information of all sites.
	 *  The returned records are in sort of priority asc
	 */
	static function gets()
	{
		$sql = "SELECT * FROM x_multisite_config";
		return db::rows( $sql );
	}
	
	
	/**
	 *  @brief checks if the log-in user owns the (sub)site that he/she access.
	 *  
	 *  @param [in] $domain domain of a sub-site.
	 *  @return boolean
	 *  true if the sub-site that the user log-in belongs to the logged user.
	 *  false otherwise.
	 *  
	 *  @details Use this function to check if the log-in user is the admin of the sub-site he accesses likewise to check when a user wants to access admin page.
	 */
	static function my( $domain )
	{
		if ( ! login() ) return false;
		
		$opt = self::get($domain);
		
		global $member;
		
		
		
		return $opt['mb_id'] == $member['mb_id'];
	}
	
	/**
	 *  @brief is an alias of my()
	 *  
	 *  @return boolean same as my()
	 *  
	 *  @details same as my()
	 */
	static function admin()
	{
		return self::my( etc::domain() );
	}
	

	/**
	 *  @brief returns my sites
	 *  
	 *  @return array list of login user's sites.
	 *  
	 *  @details simply returns all the records of user's site.
	 */	
	static function my_site()
	{
		global $member;
		return self::pre_site(db::rows("SELECT * FROM x_multisite_config WHERE mb_id='$member[mb_id]'"));
	}
	
	
	
	/**
	 *  @brief gets the configuration of a site and returns the same data after pre-processing.
	 *  
	 *  @param [in] $sites sub-site configuration
	 *  @return assoc-array pre-precessed sub-site configuratoin
	 *  
	 *  @details This does pre-processing for the easy-use. If there is no subject set in configuration, then this function sets default value for empty fields.
	 */
	static function pre_site($sites)
	{
		$rets = array();
		foreach( $sites as $site ) {
			if ( empty($site['title']) ) $site['title'] = lang('no subject');
			$rets[] = $site;
		}
		return $rets;
	}
	
	
	static function url_create()
	{
		return x::url() . '/?module=multisite&action=create';
	}
	
	
	/**
	 *  @brief 
	 *  
	 *  @param [in] $domain Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details Details
	 */
	static function url_config( $domain = null )
	{	
		if ( $domain ) $host = self::url_site($domain) . '/x';
		else $host = x::url();
		
		return $host . '/?module=multisite&action=config_help';
	}
	
	
	static function url_config_forum( $id=null ) {
		if ( empty($id) ) $id = $GLOBALS['bo_table'];
		return x::url() . "?module=multisite&action=config_forum&mode=forum_setting&bo_table=$id";
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
	static function url_site($domain)
	{
		$pi = pathinfo($_SERVER['PHP_SELF']);
		$path = $pi['dirname'];
		$path = str_replace('/bbs', '', $path);
		$path = preg_replace('/\/x?$/', '', $path);
		$url_site = 'http://' . $domain . $path;
		//dlog("url_site() : $url_site");
		return $url_site;
	}
	
	
	static function url_main_site()
	{
		$pi = pathinfo($_SERVER['PHP_SELF']);
		$path = $pi['dirname'];
		$path = str_replace('/bbs', '', $path);
		$path = preg_replace('/\/x?$/', '/', $path);
		
		return 'http://' . etc::base_domain() . $path;
	}
	
	
	/**
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
	 *  <?=g::url_board(ms::board_id(etc::domain()))?>
	 *  @endcode
	 */
	static function board_id( $domain=null )
	{
		if ( empty($domain) ) $domain = etc::domain();
		return 'ms_' . etc::last_domain($domain);
	}
	
	
	/**
	 *  @brief 
	 *  Checks if the domain of the site that the user accesses is the base domain(main site).
	 *  사용자가 접속한 현재 사이트가 메인 사이트(도메인)인지 확인한다.
	 *  
	 *  @return boolean 
	 *  true if the domain is base domain.
	 *  false otherwise.
	 *  메인 사이트이면 참을 리턴. 아니면 거짓을 리턴.
	 *  
	 *  @details 현재 사이트가 메인 사이트인지 아닌지를 구분 할 때 사용한다.
	 *  Use this funtion to check if the site is main site or sub-site.
	 */
	static function main_site()
	{
		return etc::domain() == etc::base_domain();
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
		
		$title = ms::meta('title');
		$secondary_title = ms::meta('secondary_title');
		
		if ( !$title ) $title = 'Welcome';
		if ( !$secondary_title ) $secondary_title = etc::domain();
		
		$g5['title'] = $title;
		$config['cf_title'] = $secondary_title;
	}
	
	
	static function site_menu() {
		return x::dir() .'/module/multisite/subsite_config_menu.php';
	}



	/*
	static function get_theme_options($domain){
		$sql = "SELECT extra FROM x_multisite_config WHERE domain='$domain'";	
		$results = db::result( $sql );
		return string::unscalar( $results );
	}
	*/
	
	
	
	
	
	
	/**
	 *  @brief Updates options
	 *  
	 *  @param [in] $option Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details updates multisite configuration
	 *  @important no more 'extra' field.
	 */
	static function update( $option ) {
		db::update( 'x_multisite_config', array( 'title' => $option['title']), array( 'domain' => etc::domain() ) );
	}
	
	
	
	
	
	static function theme( $file=null )
	{
		$path = x::dir() . '/theme/' . self::meta('theme') . "/$file.php";
		return $path;
	}
	
	/**
	 *  @brief returns the number of forum of the site.
	 *  
	 *  @return int
	 *  
	 *  @details Use this function to count the number of forums of a sub-site.
	 */
	static function count_forum($domain=null)
	{
		global $g5;
		if ( empty($domain) ) $domain = etc::domain();
		$qb = "bo_table LIKE '" . ms::board_id( $domain ) . "\_%'";
		$q = "SELECT COUNT(*) FROM $g5[board_table] WHERE $qb";
		return db::result($q);
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
	 *  echo "<td align='center'>".ms::count_post(ms::forum_ids( $site['domain'] ), null )."</td>";
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
	
	
	static function members()
	{
		global $g5;
		$domain = etc::domain();
		$q = "SELECT * FROM $g5[member_table] WHERE ".REGISTERED_DOMAIN."='$domain'";
		return db::rows( $q );
	}
	

}
