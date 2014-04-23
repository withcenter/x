<?php
error_reporting( E_ALL ^ E_NOTICE );
include 'class/file.php';




$dir_tmp	= "c:/tmp";
$dir_x		= "$dir_tmp/g5x";

chdir( '..' );													/// it works on G5_PATH
$dir_g5 = getcwd();

$version	= $argv[1];


$zip_path	= "$dir_tmp/g5x.$version.zip";




check_input();



check_tmp_folder();


// copy all files (without folder) under G5_PATH.
$files = file::files( '.', '.*');
foreach ( $files as $file ) {
	copy_source( $file );
}

$dirs = file::getDirs('.');
foreach ( $dirs as $dir ) {
	if ( $dir == 'data' ) continue;
	if ( $dir == 'x' ) continue;
	copy_source( $dir );
}


// 필요한 x 파일 복사
copy_source( 'x/class' );
copy_source( 'x/css' );
copy_source( 'x/etc' );
copy_source( 'x/js' );
copy_source( 'x/img' );
copy_source( 'x/begin.php' );
copy_source( 'x/end.php' );
copy_source( 'x/index.php' );
copy_source( 'x/README.md' );


// 모듈 선택:

copy_source( 'x/module/admin' );
copy_source( 'x/module/etc' );
copy_source( 'x/module/member' );
copy_source( 'x/module/post' );
copy_source( 'x/module/site' );
copy_source( 'x/module/skin' );
copy_source( 'x/module/statics' );
copy_source( 'x/module/update' );
copy_source( 'x/module/widget' );



// 테마 선택: 필요한 테마를 여기에 추가하면 된다.
copy_source( 'x/theme/default' );
copy_source( 'x/theme/blog' );
copy_source( 'x/theme/community_3' );
copy_source( 'x/theme/mobile-community-1' );



// 위젯 선택: 필요한 위젯을 여기에 추가하면 된다.
copy_source( 'x/widget/html_banner' );
copy_source( 'x/widget/none' );
copy_source( 'x/widget/post-comment-latest' );
copy_source( 'x/widget/post-latest' );

copy_source( 'x/widget/community-3-timed-list' );
copy_source( 'x/widget/community-3-images-with-caption' );
copy_source( 'x/widget/community-3-timed-list-with-images' );
copy_source( 'x/widget/latest-community3-posts' );
copy_source( 'x/widget/community-3-popular-posts' );
copy_source( 'x/widget/community-3-latest-posts-all' );
copy_source( 'x/widget/x-rwd-gallery' );
copy_source( 'x/widget/x-latest-rwd-community-1' );
copy_source( 'x/widget/x-rwd-text-with-thumbnail' );
copy_source( 'x/widget/stat-visit' );
copy_source( 'x/widget/login-default' );
copy_source( 'x/widget/login-blog' );
copy_source( 'x/widget/blog-visits' );
copy_source( 'x/widget/login-community-3' );







// 스킨 선택: 필요한 스킨을 여기에 추가하면 된다.
copy_source( 'x/skin/board/multi' );
copy_source( 'x/skin/latest/basic' );
copy_source( 'x/skin/outlogin/basic' );
copy_source( 'x/skin/visit/basic' );

copy_source( 'x/skin/outlogin/x-outlogin-travel_3');
copy_source( 'x/skin/outlogin/x-outlogin-blog');
copy_source( 'x/skin/latest/x-latest-blog');
copy_source( 'x/skin/outlogin/x-outlogin-mobile-1' );
copy_source( 'x/skin/outlogin/x-outlogin-mobile-1-640px' );
copy_source( 'x/skin/visit/x-visit-blog');
copy_source( 'x/skin/latest/x-rwd-gallery-2-mobile-latest-posts' );




copy_source( 'x/skin/member/basic');



//// .... done here ... You need to gzip it now. ------------------------

//message("gzip", "gzip all files to $gz_path");
@unlink($zip_path);


message("zip", "zipping X files into $zip_path");
file::zipDir($dir_x, $zip_path);




message("-- FINISHED --");



function check_input()
{
	global $version;
	if ( empty( $version ) ) error("No version number. Please input something like '1.2.3' as the first argument. (ex) CMD> php etc\pack.php 2014.03.15");
}


function check_tmp_folder()
{
	global $dir_x;
	
	if ( is_dir( $dir_x ) ) {
		message("Removing '$dir_x' temporiry files");
		file::delete_folder($dir_x);
	}
	
	$re = @mkdir( $dir_x, 0777, true );
	if ( $re ) message("'$dir_x' created.");
	else error("Temporiry folder '$dir_x' does not exist and cannot be created. Check if the permission is granted and try again.");
	
}





function error($str)
{
	message( "ERROR", $str );
	exit;
}


function message( $pre, $str = null )
{
	if ( empty($str) ) {
		$str = $pre;
		$pre = '';
	}
	printf(" %-12s: %s \n", $pre, $str);
}







/** @short copy source files
 *
 */
function copy_source($src)
{
	global $dir_x;
	if ( is_dir($src) ) {
		$path = "$dir_x/$src";
		message("Copy folder : $src -> $path folder");
		file::recursive_copy($src, $dir_x);
	}
	else {
		$path = $dir_x . '/' . $src;
		message("Copy file : $src -> $path");
		copy($src, $path);
	}
}

