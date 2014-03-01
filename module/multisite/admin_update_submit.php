<?php
	$domain = $sub_domain.'.'.etc::base_domain();
	$values = array('domain' => $domain, 'title'  => $title);
	db::update('x_multisite_config',$values,array('idx' => $idx));
	ms::meta( $domain, 'status', $status);
	jsGo("?module=$module&action=admin_update&idx=$idx", 'Successfully Changed');