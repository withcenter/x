<?php

class debug {

	static $count = 0;
	static function log($msg = null)
	{
		if ( is_array($msg) ) {
			ob_start();
			print_r($msg);
			$msg = ob_get_clean();
		}
		self::$count ++;
		$included_files = debug_backtrace();
		$pi = pathinfo( $included_files[ count($included_files) - 2 ]['file'] );
		$fn = $pi['basename'];
		file::append( data::path('debug.log'), '[' . self::$count . '] ' . $fn . "\t: " . $msg . "\n" );
	}
	
}

/**
 *  @brief 디버그 메세지를 파일에 저장한다.
 *  
 *  @param [in] $msg 파일에 저장 할 문자열
 *  @return NaN
 *  
 *  @details 소문자 D 와 소문자 log 이다. di() 는 웹으로 출력을 한다.
 */
function dlog( $msg )
{
	debug::log($msg);
}

function di( $v )
{
	echo "<pre>";
	print_r($v);
	echo "</pre>";
}
