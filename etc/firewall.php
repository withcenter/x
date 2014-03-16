<?php


	if (
		$in['module'][0] == '.' ||
		$in['module'][0] == '/' ||
		$in['action'][0] == '.' ||
		$in['action'][0] == '/'
	) {
	
		dlog("attack: malicious input");
		exit;
	}