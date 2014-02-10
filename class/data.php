<?php

class data {

	static function path($file = null)
	{
		$path = G5_DATA_PATH;
		if ( $file ) {
			$path = $path . DIRECTORY_SEPARATOR . $file;
		}
		return $path;
	}
	
	
}
