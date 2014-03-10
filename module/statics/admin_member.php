<style>
.domain { display:inline-block; padding: 0.4em; width: 140px; background-color: #dfdfdf; }
.count  { display:inline-block; padding: 0.4em; width: 140px; background-color: #e9e9e9; }
</style>
It does not show if the number of a domain member is less than 3.
<br>

<?php
	$rows = g::member_count_by_domain();
	foreach ( $rows as $row ) {
		if ( $row['cnt'] < 3 ) continue;
		$domain = $row[REGISTERED_DOMAIN];
		if ( empty($domain) ) $domain = "NO DOMAIN";
		echo "
			<span class='domain'>$domain</span>
			<span class='count'>$row[cnt]</span>
			<br>
		";
	}
	
	