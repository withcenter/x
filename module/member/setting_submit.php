<?php
	set_session('user_language', $in['user_language']);
	jsGo("?module=$module&action=setting");
	