<?php
	include module( 'init' );
		x::hook("module_begin");
	include module( $action );
		x::hook("module_end");