<?php
	if ( ! ms::admin() || $is_admin != 'super' ) {
		echo "You are not admin";
		return;
	}
	ms::update( $in );
	jsGo('?module=multisite&action=config_menu&done=1');
