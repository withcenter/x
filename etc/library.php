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
	global $widget_config, $widget_css;
	if ( empty($name) ) $name = $widget_config['name'];
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
	global $widget_config, $widget_javascript;
	if ( empty($name) ) $name = $widget_config['name'];
	if ( isset( $widget_javascript[ $name ] ) ) return;
	else {
		$widget_javascript[ $name ] = true;
		$src = x::url() . "/widget/$name/$name.js";
		echo "<script src='$src' /></script>";
	}
}

/**
 *  @brief loads widget configuration and saves into global $widget_config.
 *
 *
 *  @note
 *		first, it will set config from the parametas of widget(). it is set before this call.
 *		second, it will merge config with previously set ( in meta data ).
 *		third, it will save the configuration of config.xml into $widget_config['xml']
 *		
 *  @code
		load_widget_config($code);
 *  @endcode
 */
function load_widget_config($code, $name=null)
{
	global $widget_config;
	$cfg = string::unscalar(meta_get("widget_config.$code"));
	if ( ! empty($cfg) ) {
		foreach ( $cfg as $k => $v ) {
			$widget_config[ $k ] = $v;
		}
	}
	
	
	/** @short use the default name */
	if ( empty( $widget_config['name'] ) && $name ) $widget_config['name'] = $name;
	
	$widget_config['xml'] = load_xml( x::dir() . "/widget/$widget_config[name]/config.xml" );
}

$widget_config_form_name =  null;
$widget_config_form_display_text = null;
$widget_config_form_place_holder = null;
function widget_config_form( $file, $form_name="form_name", $display_text="Display Text", $place_holder="Place Holder" )
{
	global $widget_config_form_name, $widget_config_form_display_text, $widget_config_form_place_holder;

	$widget_config_form_name =  $form_name;
	$widget_config_form_display_text = $display_text;
	$widget_config_form_place_holder = $place_holder;
	return "module/widget/config.$file.php";
}



function widget_config_extra_begin()
{
	global $widget_config;
	
	if ( $widget_config['widget-extra-display'] == 'OPEN' ) {
		$display = 'none';
		$text = "OPEN";
	}
	else {
		$display = 'block';
		$text = "CLOSE";
	}
	
	echo "
		<div class='widget-extra-button'>Extra Configuration : <span>$text</span></div>
		<div class='widget-extra' style='display:$display;'>
	";
}
function widget_config_extra_end()
{
	echo "</div>";
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






function load_config( $path )
{
	return etc::load_and_parse_xml_into_assoc( $path );
}


function load_xml( $path )
{
	return etc::load_and_parse_xml_into_assoc( $path );
}
