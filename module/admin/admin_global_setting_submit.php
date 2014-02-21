<?php
	x::config('system_global_setting', string::scalar($in));
	jsGo("?module=$module&action=admin_global_setting");
	