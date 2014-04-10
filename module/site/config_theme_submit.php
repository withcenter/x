<?php


/** @short "data integrity violation".
 * 
 *
 *
 *
	$domain = etc::domain();
	$priority = 10;
	md::config_update();
	
 */
x::meta('theme', $theme);
jsGo('?module='.$module.'&action=config_theme');
