<?php
	if ( g::group_exist('multisite') ) {
		patch_message("multisite group already created");
	}
	else {
		g::group_create( array('id'=>'multisite', 'subject'=>'multisite') );
		patch_message("multisite group created");
	}
	if ( g::forum_exist( 'default' ) ) {
		patch_message("default forum already created");
	}
	else {
		g::board_create( array('id'=>'default', 'subject'=>'Default Forum', 'group_id'=>'multisite') );
		patch_message("default  forum created");
	}
	
	