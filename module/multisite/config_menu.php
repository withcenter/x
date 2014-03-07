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
<form action='?' class='config_menu'>
		<input type='hidden' name='module' value='multisite' />
		<input type='hidden' name='action' value='config_menu_submit' />
<div class='config site-global'>
	<?include ms::site_menu();?>
<div class='config-wrapper'>
		<div class='config-main-title'>
			<div class='inner'>
				<span class='config-title-info'><img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 메뉴 선택</span>
				<span class='config-title-notice'><span class='user-google-guide-button inner-title' page = 'google_doc_1'>[도움말]</span></span>
				<div style='clear: both'></div>
			</div>
		</div>
	
		<div class='config-wrapper'>
			<div class='hidden-google-doc google_doc_1'>	
				<div>필고 사이트 서비스 설명서:</div>
				<iframe src="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep" style='width:99.5%; height: 400px;'></iframe>	
			</div>
						<div class='config-title'>
				<span class='config-title-info'>
					<span class='menu-num'>번호</span>
					<span class='menu-select-name'>메뉴 선택</span>
					<span class='menu-num sec'>번호</span>
					메뉴 선택
				</span>
		
			</div>	
			<div class='config-container'>

	<table width='100%' cellspacing='0' cellpadding='0' class='config-menu-table'>
	<tr valign='top'><td width='50%'>
		<table width='100%' cellspacing='0' cellpadding='0'>
			<? for ( $i = 1; $i <= 5; $i++ ) { ?>
			<tr valign='top'>
				<td class='menu-no' valign='top' width='40' align='left'><?=$i?></td>
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
		</table>
	</td><td>
		<table width='100%' cellspacing='0' cellpadding='0' class='config-menu-table'>
			<? for ( $i = 6; $i <= 10; $i++ ) { ?>
			<tr valign='top'>
				<td class='menu-no' valign='top' width='40' align='left'><?=$i?></td>
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
		</table>
	</td></tr></table>
	
	
	</div></div>
</div>
				<input type='submit' value='업데이트' class='per-config-submit'>
				<div style='clear:right;'></div>
</div>
</form>