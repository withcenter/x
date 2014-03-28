<?php

	$user_agreement = meta( 'user_agreement' );
	$user_information_agreement = meta( 'user_information_agreement' );
	
	
	if ( empty( $user_agreement ) && empty( $user_information_agreement ) ) {
		$_POST['agree'] = 'y';
		!$_POST['agree2'] = 'y';
		include g::dir() . '/bbs/register_form.php';
		exit;
	}
	
	
	$config['cf_stipulation']	= $user_agreement;
	$config['cf_privacy']		= $user_information_agreement;
	
	
	
	