<?php

	$rows = db::rows("SELECT * FROM x_config WHERE code LIKE 'visit.%'");
	di($rows);
	