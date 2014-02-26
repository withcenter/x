<?php
/**
 *  @brief plants x/etc/install.php in common.php where it should be loaded upon installation.
 *  
 *  @return empty
 *  
 *  @details use this to translate Korean to English for installation page.
 */
	include 'class/file.php';
	patch_begin(__FILE__);
	$path = '../common.php';
	$data = file::read($path);
	$find = "<!doctype html>";
	$patch = "\n<?include 'x/etc/install/install.php'?>\n";
	if ( pattern_exist( $data, $patch ) ) {
		patch_message(' already patched');
	}
	else {
		if ( pattern_exist($data, $find) ) {
		
			list ( $a, $b ) = explode( $find, $data );
			$data = $a . $patch . $find . $b;
			file::write( $path, $data );
			patch_message(" patched");
			
		}
		else patch_failed();
	}
	
	
	patch_message("install/index.php");
	$path = '../install/index.php';
	$data = file::read($path);
	$patch = "<?php return include '../x/etc/install/index.php'?>";
	if ( pattern_exist( $data, $patch ) ) {
		patch_message('already patch');
	}
	else {
		$data = "$patch\n$data";
		file::write( $path, $data );
		patch_message("patched");
	}
	
	
	patch_message("install.inc.php");
	$path = '../install/install.inc.php';
	$data = file::read($path);
	$patch = "<?php return include '../x/etc/install/install.inc.php'?>";
	if ( pattern_exist( $data, $patch ) ) {
		patch_message('already patch');
	}
	else {
		$data = "$patch\n$data";
		file::write( $path, $data );
		patch_message("patched");
	}
	
	
	/**
	 *  For install_db.php will not create a new script. It will only patch Korean to Enlgish.
	 */
	patch_message("install_db.php");
	$path = '../install/install_db.php';
	$data = file::read($path);
	
	
	$patch = "MySQL Host, User, Password 를 확인해 주십시오.";
	$replace = "Error: Wrong MySQL Host, User, Password. Please double check";
	$data = patch_data( $data, $patch, $replace );
	
	//
	$patch = "뒤로가기";
	$replace = "GO BACK";
	$data = patch_data( $data, $patch, $replace );
	
	
	//
	$patch = "MySQL DB 를 확인해 주십시오.";
	$replace = "Error: Check MySQL DB";
	$data = patch_data( $data, $patch, $replace );
	
	//
	$patch = "설치가 시작되었습니다.";
	$replace = "Installation has begun";
	$data = patch_data( $data, $patch, $replace );
	
	//
	$patch = "전체 테이블 생성 완료";
	$replace = "Table creation finished";
	$data = patch_data( $data, $patch, $replace );
	
	
	
	$patch = "DB설정 완료";
	$replace = "Database configuration is OK";
	$data = patch_data( $data, $patch, $replace );
	
	
	//
	$patch = "데이터 디렉토리 생성 완료";
	$replace = "Data repository creation finished";
	$data = patch_data( $data, $patch, $replace );
	
	
	
	
	//
	$patch = "DB설정 파일 생성 완료";
	$replace = "Database configuration file has created";
	$data = patch_data( $data, $patch, $replace );
	
	//
	$patch = "축하합니다.";
	$replace = "Congratulation";
	$data = patch_data( $data, $patch, $replace );
	
	$patch = "설치가 완료되었습니다.";
	$replace = "Installation has finished";
	$data = patch_data( $data, $patch, $replace );
	
	$patch = "환경설정 변경은 다음의 과정을 따르십시오.";
	$replace = "Please follow to configure site";
	$data = patch_data( $data, $patch, $replace );
	
	$patch = "메인화면으로 이동";
	$replace = "Move to first page";
	$data = patch_data( $data, $patch, $replace );
	
	$patch = "관리자 로그인";
	$replace = "Sign in as Super Admin";
	$data = patch_data( $data, $patch, $replace );
	$patch = "관리자 모드 접속";
	$replace = "Open Admin Page";
	$data = patch_data( $data, $patch, $replace );
	$patch = "환경설정 메뉴의 기본환경설정 페이지로 이동";
	$replace = "Open Basic Settings page";
	$data = patch_data( $data, $patch, $replace );
	$patch = "새로운 그누보드5로 이동";
	$replace = "Move to first page";
	$data = patch_data( $data, $patch, $replace );
	
	
	
	file::write( $path, $data );
	patch_message("patched");
	
	
	patch_message("install_config.php");
	$path = '../install/install_config.php';
	$data = file::read($path);
	$patch = "<?php return include '../x/etc/install/install_config.php'?>";
	if ( pattern_exist( $data, $patch ) ) {
		patch_message('already patch');
	}
	else {
		$data = "$patch\n$data";
		file::write( $path, $data );
		patch_message("patched");
	}
	
	patch_message("OK");
	
	
	
	