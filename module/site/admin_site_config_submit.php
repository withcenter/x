<?php


	if ( $site_create_form_theme == 'hide' && empty($site_create_theme_default) ) {
		return jsBack("ERROR: No default theme is selected when it is set to use default theme. Choose a default theme or let use select theme.");
	}
	
	config( 'site_create_limit_per_member', $site_create_limit_per_member );
	config( 'site_create_theme_default', $site_create_theme_default );
	
	config( 'site_create_form_theme', $site_create_form_theme );
	
	
							
							
	

	jsGo( "?module=$module&action=admin_site_config" );