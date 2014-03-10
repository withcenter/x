<style>
.domain { display:inline-block; padding: 0.4em; width: 140px; background-color: #dfdfdf; }
.text  { display:inline-block; padding: 0.4em; width: 440px; background-color: #e9e9e9; }
.today, .yesterday, .max, .sum { display:inline-block; width: 100px; }
</style>
It does not show if the number of a domain member is less than 3.
<br>


	
	
	
@todo : 
total of today
total of yesterday
total of max
total of sum

<br>
	<div class='row-header'>
			<span class='domain'>Domain</span>
			<span class='text'>
				<span class='today'>Today</span>
				<span class='yesterday'>Yesterday</span>
				<span class='max'>Max</span>
				<span class='sum'>Sum</span>
			</span>
			</div>
		
		
<?php
	$rows = db::rows("SELECT * FROM x_config WHERE code LIKE 'visit.%'");
	foreach ( $rows as $row ) {
		$domain = str_replace('visit.', '', $row['code']);
		$visits[$domain] = unserialize( $row['value'] );
	}
	$visits = util::sort_by_field( $visits, 0, true );
	
	foreach ( $visits as $domain=>$visit ) {
		echo "
			<div class='visit'>
			<span class='domain'>$domain</span>
			<span class='text'>
				<span class='today'>$visit[0]</span>
				<span class='yesterday'>$visit[1]</span>
				<span class='max'>$visit[2]</span>
				<span class='sum'>$visit[3]</span>
			</span>
			</div>
		";
	}
	