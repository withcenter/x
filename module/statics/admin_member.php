<style>
.domain { display:inline-block; padding: 0.4em; width: 140px; background-color: #dfdfdf; }
.count  { display:inline-block; padding: 0.4em; width: 140px; background-color: #e9e9e9; }
</style>
It does not show if the number of a domain member is less than 3.
<br>

<?php
	$rows = g::member_count_by_domain();
?>
<table cellpadding=0 cellspacing=0 width='100%' border=1>
	<tr class='table-header'>
		<td>도메인</td>
		<td>회원수</td>
		<td>설정</td>
	</tr>
<?php
	foreach ( $rows as $row ) {
		if ( $row['cnt'] < 3 ) continue;
		$domain = $row[REGISTERED_DOMAIN];
		if ( empty($domain) ) $domain = "NO DOMAIN";
		$setting_url = x::url().'/?module=multisite&action=config_member&domain='.$domain;
		echo "
			<tr>
				<td>$domain</td>
				<td>$row[cnt]</td>
				<td>
					<a href='$setting_url'>설정</a>
				</td>
			</tr>
		";
	}
?>
</table>
	