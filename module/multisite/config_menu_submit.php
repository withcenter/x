<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	for ( $i = 1; $i <= 10; $i++ ) {
		ms::meta( 'menu_'.$i, $in['menu_'.$i] );
	}
	jsGo('?module=multisite&action=config_menu&done=1');
