<?php
	include 'dist-menu.php';
	
	
	
	$count_theme = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'theme'
		)
	);
	
	$count_widget = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'widget'
		)
	);
	
	$count_module = x::data_count(
		array(
			'first'		=> 'source',
			'second'	=> 'module'
		)
	);
	
?>
<br>


<a href='?module=update&action=list&type=theme'>THEME(<?=$count_theme?>)</a>,
<a href='?module=update&action=list&type=widget'>WIDGET(<?=$count_widget?>)</a>,
<a href='?module=update&action=list&type=module'>MODULE(<?=$count_module?>)</a>


<br>
<?
	if ( empty($type) ) return;
	
	$rows = x::data_gets(
		array(
			'first'			=> 'source',
			'second'		=> $type,
		)
	);
	
	di($rows);
	