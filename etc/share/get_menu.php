<?php
		$menus = array();
		for ( $i = 1; $i <= MAX_MENU; $i++ ) {
			$bo_key		= "menu{$i}bo_table";
			$bo_id			= x::meta($bo_key);
			if ( empty($bo_id) ) continue;
			$bo_name	= x::meta("menu{$i}name");
			if ( empty($bo_name) ) {
				$cfg = g::config($bo_id);
				if ( empty($cfg['bo_subject']) ) $bo_name = ln("No Subject", "제목없음");
				else $bo_name = $cfg['bo_subject'];
			}
			$menus[$bo_id] = $bo_name;
		}
		if ( empty($menus) ) {
			$menus['default'] = ln("Please", "관리자");
			$menus['fake-id-1'] = ln("config", "페이지에서");
			$menus['fake-id-2'] = ln("menu", "메뉴를");
			$menus['fake-id-3'] = ln("in admin", "설정");
			$menus['fake-id-4'] = ln("page", "하세요");
		}
		
		