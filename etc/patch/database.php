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
	
	patch_message('patched: create tables (x_*****) if not exist.');

	
	$key = db::key_exist( $g5['member_table'], 'registered_domain' );
	if ( $key ) {
		patch_message("already patched: ADD INDEX ( 'registered_domain' )");
	}
	else {
		db::query("ALTER TABLE `{$g5['member_table']}` ADD INDEX registered_domain ( `mb_10` )");
		patch_message("patched: ADD INDEX ( mb_10 )");
	}
	
	
	//
	$key = db::key_exist( $g5['visit_table'], 'domain' );
	if ( $key ) {
		patch_message("already patched: adding domain field and key for visit table");
	}
	else {
		$key = db::key_exist( $g5['visit_table'], 'index1' );
		if ( $key ) {
			db::query("DROP INDEX index1 ON {$g5['visit_table']}");
		}
		db::query("CREATE INDEX index1 ON {$g5['visit_table']}( `vi_date`, `vi_ip` ) ");
			
		db::query("ALTER TABLE {$g5['visit_table']} ADD `domain` VARCHAR( 64 ) NOT NULL AFTER `vi_id` ");
		db::query("ALTER TABLE {$g5['visit_table']} ADD UNIQUE domain ( `domain`, `vi_date`, `vi_ip` ) ");
		patch_message("patched: ADD domain field and key for visit table");
	}
	
	
	//
	$key = db::key_exist( $g5['visit_sum_table'], 'domain' );
	if ( $key ) {
		patch_message("already patched: adding domain field and key for visit_sum table");
	}
	else {
	
		db::query("ALTER TABLE {$g5['visit_sum_table']} DROP PRIMARY KEY");
		db::query("ALTER TABLE {$g5['visit_sum_table']} ADD INDEX vs_date (`vs_date`)");
		db::query("ALTER TABLE {$g5['visit_sum_table']} ADD `domain` VARCHAR( 64 ) NOT NULL FIRST ");
		db::query("ALTER TABLE {$g5['visit_sum_table']} ADD UNIQUE domain ( `domain`, `vs_date` ) ");
		patch_message("patched: ADD domain field and key for visit_sum table");
	}
	
	
	
	
	
	


	