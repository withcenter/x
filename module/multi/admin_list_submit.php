<?php
	if ( $mode == 'delete_theme' ) {
		meta_delete( $domain, 'theme' );
		jsGo("?module=$module&action=admin_list&idx=$idx");
	}
	