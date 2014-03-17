<?php



	for ( $i=1; $i<=10; $i++ ) {
		x::meta( "menu{$i}bo_table", $in[ "menu{$i}bo_table" ] );
		x::meta( "menu{$i}name", $in[ "menu{$i}name" ] );
	}
	

	jsGo( "?module=$module&action=config_menu" );
	