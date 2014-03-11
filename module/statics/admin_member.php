<style>
.domain { display:inline-block; padding: 0.4em; width: 140px; background-color: #dfdfdf; }
.count  { display:inline-block; padding: 0.4em; width: 140px; background-color: #e9e9e9; }
</style>
It does not show if the number of a domain member is less than 3.
<br>

<?php
$cond = $limit = null;
if ( $domain ) $cond = " WHERE " . REGISTERED_DOMAIN . " LIKE '%{$domain}%' ";
if ( $no_of_rows ) $limit = "LIMIT 0, $no_of_rows";

	$q = "SELECT ".REGISTERED_DOMAIN.",count(*) as cnt FROM $g5[member_table] $cond GROUP BY ".REGISTERED_DOMAIN." ORDER BY cnt DESC $limit";
	$rows = db::rows( $q );
?>
<form method='get'>
	<input type='hidden' name='module' value='statics' />
	<input type='hidden' name='action' value='admin_member' />
	<div>
		도메인<input type='text' name='domain' value='<?=$domain?>' placeholder='도메인 이름 입력'/>
		
		추출 행 수<select name='no_of_rows'>
			<option value=''>추출 행 수</option>
			<option value=''></option>
			<? for ( $i=500; $i<= 5000; $i = $i+500 ) {
				if ( $no_of_rows == $i ) $selected = "selected";
				else $selected = null;
			?>
				<option value='<?=$i?>' <?=$selected?>><?=$i?>행</option>
			<?}?>
		</select>
		<input type='submit' value='검색' />
	</div>
</form>

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
	