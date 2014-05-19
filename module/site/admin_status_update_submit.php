<?php

	
	meta_set( $in['domain'], 'status', $in['status'] );
	jsGo("?module=$module&action=admin_site_list#".$in['domain']);
	