<?php

define('DS', DIRECTORY_SEPARATOR, true);




$in = array_merge( $_GET, $_POST );




class etc {
	
	static function dir()
	{
		return x::dir();
	}
	static function url()
	{
		return x::url();
	}
	
	/**
	 *  @brief return the path of module script.
	 *  
	 *  @param [in] $file path of file name under a module folder.
		 @param [in] $url if it is true, then it returns HTTP URL ADDRESS, NOT PATH.
		@note if there is no extension on the input $file, then it automatically adds '.php'
		@NOTE if the extension is one of js, css, jpg, gif, png then it will return in HTTP URL ADDRESS.
	 *  @return string file path
	 *  
	 *  @details global variable $module which is from HTTP INPUT will be used to determin which module folder to use.
	 *  @note to include module/init.php just use "include module( 'init' );"
	 *  especially for init.php script, it will return 'null.php' if the init.php does not exists under the module.
	 *
	 *  @code
			echo module("img/direction.png", true);
			<script src='<?=module("$module.js")?>'></script>
			module('init');
			module("$module.js");
			
		 @endcode
		 
	 *
	 */
	static function module($file,$url=false)
	{
		global $module;
		if ( strpos( $file, '.' ) === false ) $file .= '.php';
		$pi = pathinfo($file);
		if ( in_array( $pi['extension'], array('js', 'css', 'gif', 'jpg', 'png') ) ) $url = true;
		if ( $url ) $up = x::url();
		else $up = x::dir();
		$path =  "$up/module/$module/$file";
		
		if ( $file == 'init.php' ) {
			if ( file_exists( $path ) ) return $path;
			else return x::path_null();
		}
		else return $path;
	}
	/**
	 *  @brief html 폴더에 있는 스크립트 파일을 리턴하낟.
	 *  
	 *  @param [in] $file 파일 이름. 확장자 ".php" 는 제외.
	 *  @return 문자열
	 *  
	 *  @details 파일 이름을 입력하면 HTML 폴더 내에 있는 파일 경로를 리턴한다.
	 */
	static function html($file)
	{
		global $module;
		return "html/$file.php";
	}
	
	
	/**
	 *  @brief returns all the included files.
	 *  
	 *  @return array files.
	 *  
	 *  @details Intened to look into the files that are included in the run.
	 */
	static function included_files() {
		$inst = g::dir();
		$files = get_included_files();
		foreach ( $files as $file ) {
			$file = str_replace("\\", '/', $file);
			$file = str_replace( $inst . '/' , '', $file );
			$out[] = $file;
		}
		return $out;
	}
	
	static function client_ip()
	{
		if ( isset($_SERVER['REMOTE_ADDR']) ) return $_SERVER['REMOTE_ADDR'];
		else return NULL;
	}

	
	/** @short returns (impossible to guess) uniqid
	 *
	 *	 @note use this function to name a file.
	 */
	static function uniqid()
	{
		$str = uniqid( rand(), true ) . etc::client_ip() . time() ;
		return md5( $str );
	}

	
	
	/**
	 *  @brief returns the domain of the accessed site.
	 *  
	 *  @return string domain.
	 *  i.e) abc.def.your-domain.com
	 *  
	 *  @details it returns the whole domain including all the levels. ( 2nd, 3rd, 4th ... level domains... )
	 *  
	 *  @warning It does not return the orinal domain. It sometimes change domain to fit to 'X'.
	 */
	static function domain()
	{
		return x::domain();
		// return $_SERVER['HTTP_HOST'];
	}
	
	
	
	// ################################################################## helper functions
	// get base domain (domain.tld)
	// usage : etc::base_domain($_SERVER['HTTP_HOST'])
	// usage : etc::base_domain("asdfasdfa.asdfasdf.asdfasdf.asdfasd.31413241234.123.4123.4.1234.1324.abc.com"); => abc.com
	// @return
	//						www.abc.com				=>		abc.com
	//
	/*____________________________________________________________________________*/
	static function base_domain($full_domain=null)
	{
		if ( $full_domain === null ) {
			$full_domain = $_SERVER['HTTP_HOST'];
		}
	  
	  // generic tlds (source: http://en.wikipedia.org/wiki/Generic_top-level_domain)
	  $G_TLD = array(
		'biz','com','edu','gov','info','int','mil','name','net','org',
		'aero','asia','cat','coop','jobs','mobi','museum','pro','tel','travel',
		'arpa','root',
		'berlin','bzh','cym','gal','geo','kid','kids','lat','mail','nyc','post','sco','web','xxx',
		'nato',
		'example','invalid','localhost','test',
		'bitnet','csnet','ip','local','onion','uucp',
		'co'   // note: not technically, but used in things like co.uk
	  );
	  
	  // country tlds (source: http://en.wikipedia.org/wiki/Country_code_top-level_domain)
	  $C_TLD = array(
		// active
		'ac','ad','ae','af','ag','ai','al','am','an','ao','aq','ar','as','at','au','aw','ax','az',
		'ba','bb','bd','be','bf','bg','bh','bi','bj','bm','bn','bo','br','bs','bt','bw','by','bz',
		'ca','cc','cd','cf','cg','ch','ci','ck','cl','cm','cn','co','cr','cu','cv','cx','cy','cz',
		'de','dj','dk','dm','do','dz','ec','ee','eg','er','es','et','eu','fi','fj','fk','fm','fo',
		'fr','ga','gd','ge','gf','gg','gh','gi','gl','gm','gn','gp','gq','gr','gs','gt','gu','gw',
		'gy','hk','hm','hn','hr','ht','hu','id','ie','il','im','in','io','iq','ir','is','it','je',
		'jm','jo','jp','ke','kg','kh','ki','km','kn','kr','kw','ky','kz','la','lb','lc','li','lk',
		'lr','ls','lt','lu','lv','ly','ma','mc','md','mg','mh','mk','ml','mm','mn','mo','mp','mq',
		'mr','ms','mt','mu','mv','mw','mx','my','mz','na','nc','ne','nf','ng','ni','nl','no','np',
		'nr','nu','nz','om','pa','pe','pf','pg','ph','pk','pl','pn','pr','ps','pt','pw','py','qa',
		're','ro','ru','rw','sa','sb','sc','sd','se','sg','sh','si','sk','sl','sm','sn','sr','st',
		'sv','sy','sz','tc','td','tf','tg','th','tj','tk','tl','tm','tn','to','tr','tt','tv','tw',
		'tz','ua','ug','uk','us','uy','uz','va','vc','ve','vg','vi','vn','vu','wf','ws','ye','yu',
		'za','zm','zw',
		// inactive
		'eh','kp','me','rs','um','bv','gb','pm','sj','so','yt','su','tp','bu','cs','dd','zr'
		);
	  
	  
	  
	  // now the fun
	  
		// break up domain, reverse
		$DOMAIN = explode('.', $full_domain);
		$DOMAIN = array_reverse($DOMAIN);
		
		// first check for ip address
		if ( count($DOMAIN) == 4 && is_numeric($DOMAIN[0]) && is_numeric($DOMAIN[3]) )
		{
		  return $full_domain;
		}
		
		// if only 2 domain parts, that must be our domain
		if ( count($DOMAIN) <= 2 ) return $full_domain;
		
		/* 
		  finally, with 3+ domain parts: obviously D0 is tld 
		  now, if D0 = ctld and D1 = gtld, we might have something like com.uk
		  so, if D0 = ctld && D1 = gtld && D2 != 'www', domain = D2.D1.D0
		  else if D0 = ctld && D1 = gtld && D2 == 'www', domain = D1.D0
		  else domain = D1.D0
		  these rules are simplified below 
		*/
		if ( in_array($DOMAIN[0], $C_TLD) && in_array($DOMAIN[1], $G_TLD) && $DOMAIN[2] != 'www' )
		{
		  $full_domain = $DOMAIN[2] . '.' . $DOMAIN[1] . '.' . $DOMAIN[0];
		}
		else
		{
		  $full_domain = $DOMAIN[1] . '.' . $DOMAIN[0];;
		}
	  // did we succeed?  
	  return $full_domain;
	}

	
	
	/**
	 *  @brief returns language string based on the language code
	 *  
	 *  @param [in] $code language code
	 *  @return string
	 *  
	 *  @details language code can be case sensitive and case insensitive.
	 *  @note it tries to match the original code and if there is no match, then it does with lower case.
	 */
	static function lang( $code, $arg1=null, $arg2=null, $arg3=null )
	{
		global $language_code;
		
		
		$code_lower = strtolower($code);

		
		if ( $string = $language_code[$code] ) {
		}
		else if ( $string = $language_code[ strtolower($code) ] ) {
		}
		else return $code;
		
		
		if ( strpos($string, '#1') !== false ) $string = str_replace("#1", $arg1, $string);
		if ( strpos($string, '#2') !== false ) $string = str_replace("#2", $arg2, $string);
		if ( strpos($string, '#3') !== false ) $string = str_replace("#3", $arg3, $string);
			
		return $string;
	}
	
	/**
	 *
	 *
	 *  @code
			<?php echo _L('Your Current Language', etc::language_from_code(etc::user_language()))?>
	 *  @endcode
	 */
	static function language_from_code( $code )
	{
		switch ( $code ) {
			case 'ko'				: return 'Korean';
			case 'en'				: return 'English';
			default					: return $code;
		}
	}
	
	
	
	
	
	
	
	/**
	 *  @brief return true if the script is running on CLI
	 *  
	 *  @return Return_Description
	 *  
	 *  @details Details
	 */
	static function cli()
	{
		return php_sapi_name() == 'cli';
	}
	
	/** @short returns true if the script is running by web browser
	 *
	 */
	static function web()
	{
		return ! self::cli();
	}
	
	
	/**
	 *  @brief 입력받은 도메인에서 첫 부분을 리턴한다.
	 *  
	 *  @param [in] $domain Parameter_Description
	 *  @return string 도메인 첫 부분.
	 *  
	 *  @details 
	 *  리턴 되는 값의 예는 아래와 같다.
	 *  abc.def.com			=> abc
	 *  last.domain.is.com	=> last
	 *  www.domain.com		=> www
	 *  domain.com			=> domain
	 *  com					=> com
	 */
	static function last_domain($domain)
	{
		list ( $last, $rest ) = explode('.', $domain, 2);
		return $last;
	}
	
	
	
	/** @short returns webbrowsers language
		이 함수는 오직 두 글자만 리턴한다.
		
		이 메소드는 오직 2 글자 짜리 코드를 리턴한다.
		
		예) ko, en, jp
		
		
	 *  @details 문서에서 언어 설정 부분을 참고한다.
	*/
	static function browser_language()
	{
		return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	}
	
	
	

	/**
	 *  @brief returns user language
	 *  
	 *  @return language code like "en" or "ko"
	 *  
	 *  @details This function returns user language code.
	 *  If a user visits the site for the first time, then
	 *  x will check browser language and use the language pack if supported.
	 *  If the language pack for the browser is not available, then it uses 'en.php' as default language pack.
	 *  User can change the language on setting page.
	 */
	static function user_language()
	{
		$code = get_session( 'user_language' );
		if ( $code ) return $code;
		else return self::browser_language();
	}
	
	
	
	static function patch_language($html, $assoc)
	{
		foreach ( $assoc as $word => $rep ) {
			$html = str_replace($word, $rep, $html);
		}
		return $html;
	}
	
	
	
// 자바 스크립트의 alert 에서 출력이 가능한 메세지를 만든다.
// 라인피드, 쌍따옴표 등을 ESCAPE 한다.
	static function jsmessage($msg)
	{

  /*
  $msg_en = "PhilGO.COM";
  $msg_ko = "필고";
  
  $h = ln($msg_ko, $msg_en);
  
  $msg = "$h\r\n\r\n$msg";
  */
  

	$msg = str_replace("\\", "\\\\", $msg);
	$msg = str_replace("\n", "\\n", $msg);
	$msg = str_replace("\r", "\\r", $msg);
	$msg = str_replace("\"", "'", $msg);


	return $msg;
}

	static function jsGo($url, $message=NULL, $target=NULL) {
		if ( $message ) $message = self::jsmessage($message);
		echo self::html_header();
		$out = "<script>";
		if ( $message ) $out.= "alert(\"$message\");";
		if ( $target ) $target = "$target.";
		$out.= "
			{$target}location.href='$url';
			</script>
		";
		//debug_log($out);
		echo $out;
	}
	
	
	
	static function jsAlert($message)
	{
		if ( $message ) $message = self::jsmessage($message);
		if ( $message ) {
			echo "<script>";
			echo "alert(\"$message\");";
			echo "</script>";
		}
		
	}
	
	static function jsBack($message)
	{
		echo self::html_header();
		if ( $message ) $message = self::jsmessage($message);
		echo "<script>";
		if ( $message ) echo "alert(\"$message\");";
		echo "
			history.go(-1);
			</script>
		";
	}
	
	
	/**
	 * @short 도메인을 소문자로 리턴한다.
	 *
	 * 2차, 3차, 4차 도메인을 인정한다.
	 리턴 값 예:
		abc.123.456.com
		www.abc.com
		abc.com
		
	 */

	static function domain_name()
	{
		if ( isset( $_SERVER['HTTP_HOST'] ) ) {
			$domain = $_SERVER['HTTP_HOST'];
			$domain = strtolower($domain);
			return $domain;
		}
		else return NULL;
	}

	
	
	
	/**
	 *  @brief determins whether the system is windows or not.
	 *  
	 *  @return true if the system wherein the PHP script is running is window.
	 *  
	 *  @details use if for test.
	 */
	static function localhost()
	{
		global $localhost;
		$localhost = false;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $localhost = true;
		/*
		else {
			$ip = $_SERVER['SERVER_ADDR'];
			if ( $ip[0] == '1' && $ip[1] == '9' && $ip[2] == '2' ) $localhost = true;
		}
		*/
		return $localhost;
	}
	
	
	/**
	 *  @brief checks if the code is run on work server.
	 *  
	 *  @return true if the script is run on work server.
	 *  
	 *  @details use it when test is needed.
	 */
	static function is_workserver()
	{
		$ip = $_SERVER['SERVER_ADDR'];
		if ( $ip[0] == '1' && $ip[1] == '9' && $ip[2] == '2' ) return true;
	}
	
	
	/** @short this is an alias of localhost()
	@code
	if ( etc::is_windows() ) echo "Yes, this system is windows.";
	else echo "No, this system is not windows.";
	@endcode
	
	 */
	static function is_windows()
	{
		return self::localhost();
	}
	
	/**
	 *  @brief checks if the code is run on test server.
	 *  
	 *  @return true if the script is run on test server.
	 *  
	 *  @details use this to run some code only on test.
	 *  @code
	 *  if ( etc::test_server() ) debug::mode(1);
	 *  @endcode
	 */
	static function test_server()
	{
		return self::is_windows() || self::is_workserver();
	}
	
	static function browser_url()
	{
		return "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
	
	
	
/** utf8 문자열을 euckr 로 변환하여 리턴한다. */
static function euckr($string)
{
  $ret = iconv("UTF-8", "EUC-KR", $string);
  if (empty($ret)) return $string;
  else return $ret;
}


/**
 *  @brief converts EUC-KR to UTF-8
 *  
 *  @param [in] $string euc-kr string
 *  @return string of utf-8
 *  
 *  @details UTF-8 string
 */
static function utf8($string)
{
  return iconv("EUC-KR", "UTF-8", $string);
}


	/**
	 *  @brief returns cache file path
	 *  
	 *  @param [in] $id Parameter_Description
	 *  @param [in] $intval INT of minutes. cache data duration. 
	 *  @return Return_Description
	 *  
	 *  @code
	 *  	$visits = etc::cache_read( $file_name );
	 *  	if ( empty($visits) ) {
	 *  		.... // code ....
	 *  		etc::cache_write( $file_name, $visits );
	 *  	}
	 *  @endcode
	 *  @details use this if you need to cache
	 *  @warning it is vernerrable to be hacked since php file can be downloaded with its content.
	 *  @todo
	 *  	1.	make it not to be downloadable. add "<?php exit;?>" on top.
	 *		2.	and add unix time stamp inside the file.
	 *  
	 */
	static function cache_read( $id, $intval = 25 )
	{
		$intval = $intval * 60;
		$file_path = G5_DATA_PATH."/cache/latest-".$id;
		if( ! G5_USE_CACHE ) return null;
		if( ! file_exists($file_path) ) return null;
		$filetime = filemtime($file_path);
		if ( $filetime && $filetime < ( G5_SERVER_TIME - $intval) ) {
			@unlink($file_path);
			return null;
		}
		return string::unscalar(file::read( $file_path ));
	}

	
	static function cache_write( $id, $data )
	{
		$file_path = G5_DATA_PATH."/cache/latest-".$id;
		file::write( $file_path, string::scalar( $data ) );
	}
	
	/** @short returns the path of last included file.
		@code
		$file = etc::last_included();
		if ( strpos( $file, 'latest' ) ) {
		...
		}
		@endcode
	 */
	static function last_included()
	{
		$included_files = get_included_files();
		return $included_files[ count($included_files) - 1 ];
	}
	static function html_header()
	{
		return<<<EOH
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
EOH;
	}


	

} // eo etc class




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


function login_first()
{
	return etc::html('login_first');
}

function login()
{
	global $member;
	if ( empty($member['mb_id']) ) return false;
	return ture;
}


function lang($code)
{
	return etc::lang($code);
}

function ln($en, $ko=null)
{
	$ln = etc::user_language();
	if ( $ln == 'en' ) return $en;
	else {
		if ( $ko ) return $ko;
		else return $en;
	}
}



/**
 *  @brief return true if the user is accessing admin page.
 *  관리자 페이지이면 참을 리턴한다.
 *  
 *  @return boolean
 *  
 *  @details 접속한 사용자가 관리자 페이지를 보고 있다면 참을 리턴한다.
 */
function admin_page()
{
	$self = $_SERVER['PHP_SELF'];
	return preg_match("/\/adm\//", $self);
}

function write_page()
{
	$self = $_SERVER['PHP_SELF'];
	return preg_match("/\/write.php/", $self);
}

/**@short return true if the accessed page is 'read' or 'view' page. */
function read_page()
{
	global $wr_id;
	return isset($wr_id) && $wr_id;
}



function board_form_page()
{
	$self = $_SERVER['PHP_SELF'];
	return preg_match("/\/board_form.php/", $self);
}




/**
 *  @brief 패치 파일의 경로를 리턴한다.
 *  
 *  @param [in] $file Parameter_Description
 *  @return Return_Description
 *  
 *  @details 패치 파일은 "patch.xxxxxxx.php" 와 같은 형식을 가지며 html 폴더에 저장된다.
 *  
 */
function patch( $file )
{
	return x::dir() . ds . 'html' . ds . "patch.$file.php";
}



function _L($code, $a=null, $b=null, $c=null)
{
	return etc::lang($code, $a, $b, $c);
}





/** 
 */
function jsGo($url, $message=null, $target=null)
{
	return etc::jsGo($url, $message, $target);
}

/** 
 */
function jsBack($message=null)
{	return etc::jsBack($message);
}

function jsAlert($message=null)
{
	return etc::jsAlert($message);
}



function html_header()
{
	return etc::html_header();
	
}






function path_logo($domain=null)
{
	return x::path_logo($domain);
}

function url_logo($domain=null)
{
	return x::url_logo($domain);
}
function code_logo()
{
	return x::code_logo();
}

/**
 *  @brief Brief
 *  
 *  @param [in] $dir Parameter_Description
 *  @return string path of upload directory.
 *  @code
 *  	$folder = path_multi_upload( etc::last_domain(etc::domain()) );
 *  	will return
 *  	g5_path/data/upload/multisite/last-domain
 *  @endcode
 *  
 *  @details Details
 */
function path_multi_upload($dir=null)
{
	return x::path_multi_upload($dir);
}

function bo_table_name( $id ) {
	return g::write_table( $id );
}

