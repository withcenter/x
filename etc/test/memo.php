<?php
	error_reporting( E_ALL ^ E_NOTICE );
	include 'etc/x-standalone.php';
	
	g::memo_send(
		array(
			'from'		=> 'admin',
			'to'			=> 'admin',
			'content'	=> "This is just test ^^''; \"\"; later... "
		)
	);
	
	