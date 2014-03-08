
total of today
total of yesterday
total of max
total of sum


<?php

	$rows = db::rows("SELECT * FROM x_config WHERE code LIKE 'visit.%'");
	di($rows);
	