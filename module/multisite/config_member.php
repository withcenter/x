<?php

	$rows = ms::members();
	foreach ( $rows as $m ) {
		echo "
			<div>
				$m[mb_id]
				$m[mb_name]
		";
	}