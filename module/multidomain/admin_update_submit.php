<?php

/**
	* see @ref ms_config "MutiSite Configuration
	*/
	if ( empty($domain) ) {
		return jsBack('Input Domain');
	}
	$idx = md::config_update();
	jsGo( md::url_config($idx) );
	