<?php

	$path = $dir_root . '/x/etc/database/schema.sql';
	$all_lines = file($path, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
	
	foreach ($all_lines as $line) {
		if (substr($line, 0, 2) == '--' || $line == '') {
			continue;
		}
		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';') {
		db::query($templine);
		$templine = '';
		}
	}
	
	global $idx, $domain, $priority, $theme;
	
	
	$priority	= 0;
	$theme		= 'default';
	$idx		= 0;
	$domain		= '.com';
	if ( ! md::get( $domain ) ) md::config_update();
	
	$domain		= '.net';
	$idx		= 0;
	if ( ! md::get( $domain ) ) md::config_update();
	
	$domain		= '.org';
	$idx		= 0;
	if ( ! md::get( $domain ) ) md::config_update();
	
	$domain		= '.kr';
	$idx		= 0;
	if ( ! md::get( $domain ) ) md::config_update();
	
	patch_message('patched');

	
