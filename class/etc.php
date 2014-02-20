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
	 *  @param [in] $file script file name under a module folder. it should not include '.php' extension.
	 *  @return string file path
	 *  
	 *  @details global variable $module which is from HTTP INPUT will be used to determin which module folder to use.
	 *  @note to include module/init.php just use "include module( 'init' );"
	 *  especially for init.php script, it will return 'null.php' if the init.php does not exists under the module.
	 */
	static function module($file)
	{
		global $module;
		$path = x::dir() . "/module/$module/$file.php";
		if ( $file == 'init' ) {
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
	

	
	
	/**
	 *  @brief returns the domain of the accessed site.
	 *  
	 *  @return string domain.
	 *  i.e) abc.def.your-domain.com
	 *  
	 *  @details it returns the whole domain including all the levels. ( 2nd, 3rd, 4th ... level domains... )
	 */
	static function domain()
	{
		return $_SERVER['HTTP_HOST'];
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
	 */
	static function lang( $code, $arg1=null, $arg2=null, $arg3=null )
	{
		global $language_code;
		
		$code_back = $code;
		$code = strtolower($code);

		if ( ! isset($language_code[$code]) ) {
			return $code_back;
		}
		else $string = $language_code[$code];
		
		
		if ( strpos($string, '#1') !== false ) $string = str_replace("#1", $arg1, $string);
		if ( strpos($string, '#2') !== false ) $string = str_replace("#2", $arg2, $string);
		if ( strpos($string, '#3') !== false ) $string = str_replace("#3", $arg3, $string);
			
		return $string;
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

} // eo etc class




function module($file)
{
	return etc::module($file);
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

/**
 *  @brief 슈퍼 관리자이면 참을 리턴한다.
 *  
 *  @return true if super admin, otherwise false.
 *  
 *  @details 슈퍼 관리자이면 참을 리턴한다.
 */
function admin()
{
	global $is_admin;
	return $is_admin == 'super';
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



function ln($code, $a=null, $b=null, $c=null)
{
	return etc::lang($code, $a, $b, $c);
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


