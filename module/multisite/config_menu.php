<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	
	
	
	if ( $in['done'] ) {
		echo "<div class='message'>수정되었습니다.</div>";
	}

	
	$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "\_%'";
	
	$q = "SELECT bo_table, bo_subject FROM $g5[board_table] WHERE $qb";
	
	$rows = db::rows( $q );
?>
<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multisite/subsite.css' />
<script src='<?=x::url()?>/module/multisite/subsite.js'></script>
<form action='?' class='config config_menu'>
		<input type='hidden' name='module' value='multisite' />
		<input type='hidden' name='action' value='config_menu_submit' />
<div class='config site-global'>
	
		<div class='config-main-title'>
			<div class='inner'>
				<img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 메뉴 선택
				<a href='#googledoc'>도움말</a>
			</div>
		</div>
	
		<div class='config-wrapper'>
			<div class='config-container'>
	<table width='100%' cellpadding='5' class='config-menu-table'>
		<tr class='line-header'>
			<td width=80>번호</td>
			<td>메뉴 선택</td>
		</tr>
		<? for ( $i = 1; $i <= 10; $i++ ) { ?>
		<tr>
			<td class='menu-no' valign='top'><?=$i?></td>
			<td>
				<span class='select-wrapper'><span class='inner'>
					<?php
					foreach ( $rows as $row ) {
						if ( ms::meta('menu_'.$i) && ms::meta('menu_'.$i) == $row['bo_table'] ) {
							$default_value =  $row['bo_subject'];
							break;
						}
						else $default_value = null;
					}
					
					echo $default_value ? $default_value : '메뉴 선택';
					?>
				</span></span>
				<span class='select-button'><span class='inner'>
					<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
				</span></span>
				<div class='drop-down-menu'>
					<div class='row' bo_table='' bo_subject='메뉴 선택'><b>메뉴 선택</b></div>
					<div style='height: 15px;' class='row' bo_table='' bo_subject='메뉴 선택'></div>
					<?php
						foreach ( $rows as $row ) {
							echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
						}
					?>
				</div>
				<input class='hidden-value' type='hidden' name='menu_<?=$i?>' value='<?=ms::meta('menu_'.$i)?>' />
			</td>
		</tr>
		<?}?>
		<tr>
			<td colspan=2><input type='submit' value='업데이트'></td>
		</tr>
	</table>
		<div class='google-doc-wrapper'>
			<a name='googledoc'></a>
			<div>필고 사이트 서비스 설명서:</div>
			<iframe src="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep" style='width:100%; height: 400px;'></iframe>	
		</div>
	</div></div>
</div>
</form>