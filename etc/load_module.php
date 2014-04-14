<?php
	
		x::hook("module_begin");
	include module( 'init' );
	include module( $action );
		x::hook("module_end");