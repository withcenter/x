<?php
define('X_DIR_ETC', G5_PATH . '/x/etc');
define('X_DIR_THEME', G5_PATH . '/x/theme');
define('X_DIR_WIDGET', G5_PATH . '/x/widget');
define('X_DIR_MODULE', G5_PATH . '/x/module');



define('MAX_BLOG_WRITER', 3);
define( 'FORUM_NOT_EXIST', -40010 );
define('MS_EXIST', -9200);
define('MS_MAX_FORUM', 20);
define('MAX_MENU', 10);


define('REGISTERED_DOMAIN', 'mb_10');

define("ONEDAY", 86400);



/** DEBUG SETTINGS
 *
 *
 */
if ( etc::localhost() ) define( 'X_DEBUG', true );

if ( X_DEBUG ) {
	define( 'URL_EXTENDED', g::url() );
}
else {
	define( 'URL_EXTENDED', 'http://www.extended.kr' );
}
define( 'X_URL_REAL', 'http://www.extended.kr' );
define('X_URL', URL_EXTENDED);
define('URL_HOME',		G5_URL);
define('PATH_HOME',		G5_PATH);

define( 'L', etc::user_language() );



// update
define( 'X_UPDATE_TABLE', 'theme');


define( 'URL_UPDATE_SERVER', URL_EXTENDED );
define( 'URL_THEME_UPDATE_SERVER', 'http://www.extended.kr' );				/** For theme only */





 