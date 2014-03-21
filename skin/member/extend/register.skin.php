<?php
	$file = pathinfo( $_SERVER['PHP_SELF'] );
	include G5_PATH . "/skin/member/basic/$file[filename].skin.$file[extension]";
	
	