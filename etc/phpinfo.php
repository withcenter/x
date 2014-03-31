<?php
/**
 * @edited again by jaeho at 8:47 pm 2014-03-12
 */
 
 function ssh_copy( $host, $id, $pw, $path_src, $path_dst )
{
        $connection = ssh2_connect($host, 22);
        ssh2_auth_password($connection, $id, $pw);
        if ( is_file( $path_src ) ) {
                $re = ssh2_scp_send( $connection, $path_src, $path_dst, 0755 );
                return $re;
        }
        else if ( is_dir( $path_src ) ) {
                $files = getFiles( $path_src );
                foreach( $files as $file ) {

                        // @todo this must be done
                        $file = preg_replace("/^\.\//", '', $file);
                        $path = "$path_dst/$file";
                        $pp = pathinfo($path);
                        $dir = $pp['dirname'];

                        // creating folder
                        $stream = ssh2_exec( $connection, "mkdir -p $dir");
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


echo "<pre>";
$re = ssh_copy( "localhost", "g5x", "ontue0458934377", ".", "/home/g5x/test-etc" );
if ( $re === true ) {
        echo "SUCCESS";
}
else {
        echo "ERROR: $re";
}



function getFiles($dir, $re=true, $pattern=null)
        {

                $tmp = array();
                if ($handle = opendir($dir)) {
                        while (false !== ($file = readdir($handle))) {
                                if ($file != "." && $file != "..") {
                                        $file_path = $dir . DIRECTORY_SEPARATOR . $file;
                                        if ( is_dir($file_path) ) {
                                                if ( $re ) {
                                                        $tmp2 = getFiles($file_path, $re, $pattern);
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




exit;



>>>>>>> d03ed7e23242a63a22232ca2c805f1cecf91c578
phpinfo();



