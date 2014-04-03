<?php
$widget_option = array();
function widget( $option )
{
	$GLOBALS['widget_option'] = $option;
	return x::dir() . '/etc/widget.php';
}


$widget_css = array();
function widget_css( $name=null )
{
	global $wo, $widget_css;
	if ( empty($name) ) $name = $wo['name'];
	if ( isset( $widget_css[ $name ] ) ) return;
	else {
		$widget_css[ $name ] = true;
		$href = x::url() . "/widget/$name/$name.css";
		echo "<link rel='stylesheet' type='text/css' href='$href' />";
	}
}


$widget_javascript = array();
function widget_javascript( $name=null )
{
	global $wo, $widget_javascript;
	if ( empty($name) ) $name = $wo['name'];
	if ( isset( $widget_javascript[ $name ] ) ) return;
	else {
		$widget_javascript[ $name ] = true;
		$src = x::url() . "/widget/$name/$name.js";
		echo "<script src='$src' /></script>";
	}
}

