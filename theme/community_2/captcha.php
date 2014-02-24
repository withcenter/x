<?php
	session_start();
	
	define('CAPTCHA_NUMBERS', 5 );  // 캡차 문자 수
	define('CAPTCHA_WIDTH', 80 ); // 이미지 가로 
	define('CAPTCHA_HEIGHT', 20 ); // 이미지 세로
	
	// 임의의 캐릭터 색성하기
	$characters = "";
	for ( $i = 0; $i < CAPTCHA_NUMBERS; $i++ ) {
		$characters .= chr(rand(97, 122));
	}
	
	// 캡차 문자는 md5로 암호화 하여 쿠키에 저장한다.
	//$_SESSION['captcha'] = md5($characters);
	
	setcookie('captcha', md5($characters), 0, '/x/theme/withcenter');
	
	// 이미지를 담을 공간을 생성
	$img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
	
	$bg_color = imagecolorallocate( $img, 245, 245, 245 ); // 배경색
	$text_color = imagecolorallocate( $img, 33, 80, 105 );  // 글자색
	
	// 배경 그리기
	imagefilledrectangle( $img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color );
	
	
	imagettftext( $img, 16, 0, 5, CAPTCHA_HEIGHT - 5, $text_color, 'Courier New Bold.ttf', $characters );
	
	header( "Content-type: image/png" );
	imagepng( $img );
	
	imagedestroy( $img );
?>