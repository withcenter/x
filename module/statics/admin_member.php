<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/statics/statics.css' />

<?php
$cond = $limit = null;
if ( $domain ) $cond = " WHERE " . REGISTERED_DOMAIN . " LIKE '%{$domain}%' ";
if ( $no_of_rows ) $limit = "LIMIT 0, $no_of_rows";

	$q = "SELECT ".REGISTERED_DOMAIN.",count(*) as cnt FROM $g5[member_table] $cond GROUP BY ".REGISTERED_DOMAIN." ORDER BY cnt DESC $limit";
	$rows = db::rows( $q );
?>
<div class='admin-member'>
<div class='msg'>회원 수가 3명 이하인 사이트의 목록은 나타나지 않습니다.</div>
	<form method='get'>
		<input type='hidden' name='module' value='statics' />
		<input type='hidden' name='action' value='admin_member' />
		<div class='search-form'>
			<div class='title'>검색 조건</div>
			<span class='sub-item'>도메인</span><input type='text' name='domain' value='<?=$domain?>' placeholder='도메인 이름 입력'/>
			
			<span class='sub-item'>추출 행 수</span><select name='no_of_rows'>
				<option value=''>추출 행 수</option>
				<option value=''>전체보기</option>
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

	<table cellpadding=0 cellspacing=0 width='100%'>
		<tr class='table-header'>
			<td>도메인</td>
			<td width=100 align='center'>회원수</td>
			<td align='center'>설정</td>
		</tr>
	<?php
		foreach ( $rows as $row ) {
			if ( $row['cnt'] < 3 ) continue;
			$domain = $row[REGISTERED_DOMAIN];
			if ( empty($domain) ) $domain = "NO DOMAIN";
			$setting_url = x::url().'/?module=multi&action=config_member&domain='.$domain;
			$setting_icon = "<img src='".x::url()."/module/".$module."/img/setting.png' />";
			echo "
				<tr>
					<td>$domain</td>
					<td align='center'>$row[cnt]</td>
					<td align='center'>
						<a href='$setting_url'>$setting_icon</a>
					</td>
				</tr>
			";
		}
	?>
	</table>
</div>