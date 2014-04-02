<?php
/**
 *
 *  @note $wo is available in all the widget.
 *		It has code, name and configuration.
 *
 */
	$wo = &$widget_option;
	include x::dir() . "/widget/$wo[name]/$wo[name].php";
	