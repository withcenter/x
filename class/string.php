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
}
