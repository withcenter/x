<?php

class string {
	static function scalar($str)
	{
		return base64_encode(urlencode(serialize($str)));
	}
	
	static function unscalar($str)
	{
	  return unserialize(urldecode(base64_decode($str)));
	}
	
	/** @short returns string in the size of '$size' after stripping tags.
	 *
	 */
	static function cutstr( $str, $size, $suffix='...' )
	{
		$str = strip_tags($str);
		return utf8_strcut( $str, $size, $suffix );
	}
}
