<?php



class file {
	const FILE_NOT_FOUND	= -403216;

	/**
	 *  @brief returns the content of the file.
	 *  
	 *  @param [in] $filename file path
	 *  @return string file content
	 *  FILE_NOT_FOUND if there is not file by $filename
	 *  
	 *  @details The code of this function is from PHP doc.
	 *  @warning the return value has changed since jan 23, 2014
	 *  @code
	 *  	$data = file::read($dir_root . '/head.sub2.php');
	 *  	if ( empty($data) &&  $global_file_error_code == file::FILE_NOT_FOUND ) return $data;
	 *  @endcode
	 */
	static function read($filename)
	{
		global $global_file_error_code;
		@$handle = fopen($filename, "r");
		if ( ! $handle ) {
			$global_file_error_code = self::FILE_NOT_FOUND;
			return null;
		}
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
	/**
	 *  @brief append some content into file
	 *  
	 *  @param [in] $filename file name(path) to append
	 *  @param [in] $somecontent some content to append
	 *  @return 0 if success otherwise false.
	 *  
	 *  @details This code is coming from PHP document.
	 */
	static function append($filename, $somecontent)
	{
			// In our example we're opening $filename in append mode.
			// The file pointer is at the bottom of the file hence
			// that's where $somecontent will go when we fwrite() it.
			if (!$handle = fopen($filename, 'a')) {
				 return -1;
			}

			// Write $somecontent to our opened file.
			if (fwrite($handle, $somecontent) === FALSE) {
				return -2;
			}

			// echo "Success, wrote ($somecontent) to file ($filename)";

			fclose($handle);
			return 0;
	}
	
	/**
	 *  @brief Overwrite to a file.
	 *  
	 *  @param [in] $filename file path
	 *  @param [in] $somecontent file data to save
	 *  @return 0 if success
	 *  
	 *  @details This code is coming from PHP Doc
	 */
	static function write($filename, $somecontent)
	{
		// Let's make sure the file exists and is writable first.
		
			if (!$handle = fopen($filename, 'w')) {
				return -1;
			}
			// Write $somecontent to our opened file.
			if (fwrite($handle, $somecontent) === FALSE) {
				return -2;
			}
			fclose($handle);
			return 0;
			
	}
	
	
	/** @short returns file list in an array.
	 *
	 * @param [in] $recursive if set true, then it searches recursively.
	 * @param [in] $dir directory path
	 @code
	 
		di( getFiles($dir, false) );

	@endcode

		@code how to use pattern
			$files = file::getFiles(DIR_MODULE, true, "/.php/");
		@endcode
		
		@code
			$files = file::getFiles(DIR_MODULE, true, "/admin\.menu\.php/");
		@endcode
		

	 */
 
	static function getFiles($dir, $re=true, $pattern=null)
	{
		
		$tmp = array();
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$file_path = $dir . DIRECTORY_SEPARATOR . $file;
					if ( is_dir($file_path) ) {
						if ( $re ) {
							$tmp2 = self::getFiles($file_path, $re, $pattern);
							if ( $tmp2 ) $tmp = array_merge($tmp, $tmp2);
						}
					}
					else {
						if ( $pattern ) {
							if ( preg_match($pattern, $file) ) {
							}
							else continue;
						}
						array_push($tmp, $dir . DIRECTORY_SEPARATOR . $file);
					}
				}
			}
			closedir($handle);
			return $tmp;
		}
	}

	
	

/** return directories of in a directory.
 * @param $directory is a directory to search inside of it.
 *
	
 *
 */
/**
 *  @brief returns directories (of a directory)
 *  
 *  @param [in] $directory is a path(folder) to get directory list inside of it.
 *  @return Return_Description
 *  
 *  @details returns directoris.
 *  @code
 *  	$dirs = file::getDirs(DIR_THEME);
 *  @endcode
 */
static function getDirs($directory) {

	// Create an array for all files found
	$tmp = Array();

	// Try to open the directory
	if($dir = opendir($directory)) {
		
		// read the files
		while($file = readdir($dir)) {
			// Make sure the file exists
			if($file != "." && $file != ".." && $file[0] != '.') {
				// If it's a directiry, 
				if(is_dir($directory . "/" . $file))
				{
					$tmp[] = $file;
				}
			}
		}
		
		// Finish off the function
		closedir($dir);
		return $tmp;
	}
}
	
}
