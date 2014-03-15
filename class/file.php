<?php
/**
 *
 *
 * @warning PHP 5.3 and above needed to make all methods function. 
 *
 */


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
		
		@code
			$files = file::getFiles( x::dir() . '/skin/latest', true, "/preview\.png/");
			di($files);
		@code
		

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

	
	

	/**
	 *  @brief returns directories (of a directory)
	 *  
	 *  @param [in] $directory is a path(folder) to get directory list inside of it.
	 *  @return array.
	 *  
	 *  @details returns directoris. It does not search recursively.
	 *  @code
	 *  	$dirs = file::getDirs(DIR_THEME);
	 *  @endcode
	 *  @code
			$dirs = file::getDirs( x::dir() . '/skin/latest' );
			di( $dirs );
	 *	 @endcode
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

	/** @short Deletes all files in a folder and its sub folders.
	 *
	 *
		@code
			file::delete_folder($folder);
		@endcode
	 */
	static function delete_folder($folder)
	{
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
			$path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
			// msg("Deleting: " . $path->getPathname());
		}
		rmdir($folder);
	}
	
	
	/** @brief 파일을 검색해서 리턴한다.
		재귀 함수를 사용하지 않는다.
	 *
	 * @param $dir 검색할 디렉토리
	 * @param $pattern 검색할 regular expression pattern.
	 * if $pattern is ommited, then it returns all files under $dir foler or else it does pattern matches.
	 *
	 * @return 패턴 매칭 결과를 리턴한다.
	 * @example
		$ret = file::files(PATH_CORE.'/module/message',  "list.(.*).php");
		$opt_skin = array();
		foreach ( $ret as $re ) {
			$opt_skin[] = $re[1];
		}	
	 */
	static function files($dir, $pattern=null)
	{
		$files = file::getFiles($dir, false);
		$ret = array();
		foreach ( $files as $file ) {
			if ( empty($pattern) ) $ret[] = $file;
			else {
				if ( preg_match("/$pattern/", $file, $m) ) {
					$ret[] = $file;
				}
			}
		}
		return $ret;
	}
	
	/** @short returns file list of a folder and its subfolders.
	 *
	 */
	static function get_files_recursively($dir)
	{
		$ret = array();
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
			// $path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
			$ret[] = $path->getPathname();
		}
		return $ret;
	}
	
	
	
	/** @short copies a directory and its subfolders and all contents.
	 *
	 *
	 * @code
			file::recursive_copy("src-directory", "dst-directoy");
			file::recursive_copy($src, $target_folder);
		@endcode
		
	 * @todo make it option to pass some files.
	 */
	static function recursive_copy($src, $dst)
	{
		$sp = DIRECTORY_SEPARATOR;
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
			$file = $path->getPathname();
			$pi = pathinfo($file);
			// make it option.
			if ( preg_match("/^\./", $pi['filename']) ) continue;
			if ( preg_match("/CVS/", $file) ) continue;
			
				if ( $path->isFile() ) {
					// msg("file: $file");
					$dir = "$dst{$sp}$pi[dirname]";
					if ( file_exists($dir) ) {
					}
					else {
						mkdir($dir, 0777, true);
					}
					$fp = "$dst$sp$file";
					// msg("To:$dst$sp$file");
					copy($file, $dst . $sp . $file);
				}
				
		}
	}
	/** 
	* Add files and sub-directories in a folder to zip file. 
	* @param string $folder 
	* @param ZipArchive $zipFile 
	* @param int $exclusiveLength Number of text to be exclusived from the file path. 
	*/ 
	private static function folderToZip($folder, &$zipFile, $exclusiveLength) {
		$handle = opendir($folder);
		while (false !== $f = readdir($handle)) {
			if ($f != '.' && $f != '..') {
				$filePath = "$folder/$f";
				// Remove prefix from file path before add to zip.
				$localPath = substr($filePath, $exclusiveLength);
				if (is_file($filePath)) {
					$zipFile->addFile($filePath, $localPath);
				}
				else if (is_dir($filePath)) {
					// Add sub-directory.
					$zipFile->addEmptyDir($localPath);
					self::folderToZip($filePath, $zipFile, $exclusiveLength);
				}
			}
		}
		closedir($handle);
	} 
	/** @short zips a folder (including the folder name itself)
	 * @warning Be sure you are not saving the zip file into the zip folder. Save the zip file outside of the folder that are zipped up.
	 * @주의 : 압축 파일을 저장 할 때, 압축하는 폴더 안에 저장하지 않도록 주의 한다.
	 * @code The zip file to be created must be outside of the folder being zipped up.
		$zip_path	= "$dir_tmp/x-$version.zip";
		file::zipDir($dir_x, $zip_path);
		@endcode
	* 
	* @param string $sourcePath Path of directory to be zip. 
	* @param string $outZipPath Path of output zip file. 
	* @code
		file::zipDir($working_directory, "$target_directory{$sp}sapcms-1.2.2.zip");
		@endcode
	*/ 
	static function zipDir($sourcePath, $outZipPath)
	{
		$pathInfo = pathInfo($sourcePath);
		$parentPath = $pathInfo['dirname'];
		$dirName = $pathInfo['basename'];
		$z = new ZipArchive();
		$z->open($outZipPath, ZIPARCHIVE::CREATE);
		$z->addEmptyDir($dirName);
		self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
		$z->close();
	}
	/** @short it does tar and gzip a folder and its sub folders with all the content.
	 *
	 * @note use this function when you need to create 'tar' with 'gz' file on a folder.
	 *
		@code
			file::tarGzipDir("/tmp/abc", "/tmp/abc.tar", "1.2.3.tar.gz");
		@endcode
		@param $working_direcoty is the source files folder
		@param $tar is a path of tar file which will tar all the files in the $working_directory.
		@param $ext is the extention of the tar file name.
		@warning $ext must be a file name. not a full path.
		
		
	 */
	static function tarGzipDir($src, $tar, $ext=null)
	{
		/// msg("FileName: $dst");
		try {
			$a = new PharData($tar);
			$a->buildFromDirectory($src);
			$a->compress(Phar::GZ, $ext);
		}
		catch (Exception $e) {
			echo "Exception : " . $e;
		}
	}

	
}
