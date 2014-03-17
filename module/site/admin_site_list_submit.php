<?php

	meta_delete( $domain, 'title' );
	meta_delete( $domain, 'theme' );
	meta_delete( $domain, 'status' );
	jsGo("?module=$module&action=admin_site_list");
	