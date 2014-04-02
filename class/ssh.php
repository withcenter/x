<?php

class ssh
{
	const CONNECTION_FAILED = -1;
	const LOGIN_FAILED = -2;
	
	/**
	 *  @brief copy local files to remote server.
	 *  
	 *  @param [in] $host host of ssh
	 *  @param [in] $id id of ssh
	 *  @param [in] $pw password of ssh
	 *  @param [in] $path_src source file or source folder to be uploaded.
	 *  @param [in] $path_dst target file or target folder to be created ( or replaced ).
	 *  @return Return_Description
	 *  
	 *  @details Use this function to upload files.
	 */
	static function ssh_copy( $host, $id, $pw, $path_src, $path_dst )
	{
		@$connection = ssh2_connect($host, 22);
		if ( ! $connection ) return self::CONNECTION_FAILED;
		@$re = ssh2_auth_password($connection, $id, $pw);
		if ( ! $re ) return self::LOGIN_FAILED;
		if ( is_file( $path_src ) ) {
				$re = ssh2_scp_send( $connection, $path_src, $path_dst, 0755 );
				return $re;
		}
		else if ( is_dir( $path_src ) ) {
				chdir( $path_src );
				$files = getFiles( $path_src );
				foreach( $files as $file ) {
						$file = preg_replace("/^\.\//", '', $file);
						$path = "$path_dst/$file";
						$pp = pathinfo($path);
						$dir = $pp['dirname'];

						// creating folder
						$stream = ssh2_exec( $connection, "mkdir -p $dir" );
						$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
						stream_set_blocking($errorStream, true);
						stream_set_blocking($stream, true);
						$stdout = stream_get_contents($stream);
						$stderr = stream_get_contents($errorStream);
						if ( !empty($stderr) ) return "failed on creating folder: $stderr";

						$re = ssh2_scp_send( $connection, $file, $path, 0755 );
						if ( ! $re ) return "failed on sending $path";
				}
				return $re;
		}
	}

}