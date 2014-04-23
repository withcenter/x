<?php
	$site = site_get( $in['idx'] );
	if ( $site['domain'] != $in['domain'] && site_get( $domain ) ) {
		jsBack("Domain exists. Choose another");
		return;
	}
	
	
	$idx = site_set( $in['idx'], $domain, $mb_id, $good );
	
	
	meta_set( $domain, 'title', $title );
	meta_set( $domain, 'theme', $theme );
	meta_set( $domain, 'status', $status );
	meta_set( $domain, 'forward', $in['forward'] );
	
	jsGo("?module=$module&action=admin_site_add_update&idx=$idx");

