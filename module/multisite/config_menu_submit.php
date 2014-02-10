<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	ms::update( $in );
	jsGo('?module=multisite&action=config_menu&done=1');
