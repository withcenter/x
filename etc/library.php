<?php
$widget_config = array();
function widget( $option )
{
	$GLOBALS['widget_config'] = $option;
	return x::dir() . '/etc/widget.php';
}


$widget_css = array();
function widget_css( $name=null )
{
	global $wc, $widget_css;
	if ( empty($name) ) $name = $wc['name'];
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
	global $wc, $widget_javascript;
	if ( empty($name) ) $name = $wc['name'];
	if ( isset( $widget_javascript[ $name ] ) ) return;
	else {
		$widget_javascript[ $name ] = true;
		$src = x::url() . "/widget/$name/$name.js";
		echo "<script src='$src' /></script>";
	}
}



function javascript_jquery()
{
	$x_url=x::url();
	return <<<EOH
	<!--[if lt IE 9]>
		<script type='text/javascript' src='$x_url/js/jquery-1.11.0.min.js?version=1110'></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type='text/javascript' src='$x_url/js/jquery-2.1.0.min.js?version=2010'></script>
	<!--<![endif]-->
EOH;
}





