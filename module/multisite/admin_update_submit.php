<?php
$dom_compare = ms::get("$idx");
if(($sub_domain==null && $title==null) || (($dom_compare['title'] == $title && $dom_compare['domain'] == $sub_domain.'.'.etc::base_domain()))) { jsBack('No Changes');}
else {
	$values = array('domain' => $sub_domain.'.'.etc::base_domain(), 'title'  => $title);
	db::update('x_multisite_config',$values,array('idx' => $idx));
	jsBack('Successfully Changed');
}