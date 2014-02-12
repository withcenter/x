<?
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	
	if ( $in['done'] ) {
		echo "<div class='message'>Updated</div>";
	}

	
	$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
	
	$q = "SELECT bo_table, bo_subject FROM $g5[board_table] WHERE $qb";
	
	$rows = db::rows( $q );
?>
<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multisite/subsite.css' />
<script src='<?=x::url()?>/module/multisite/subsite.js'></script>
<form action='?' class='config_menu'>
		<input type='hidden' name='module' value='multisite' />
		<input type='hidden' name='action' value='config_menu_submit' />
<div class='config'>
	<table width='100%' cellpadding='5px' class='config-menu-table'>
		<tr class='line-header'>
			<td width=170>Menu No</td>
			<td>Select MENU</td>
		</tr>
		<? for ( $i = 1; $i <= 10; $i++ ) { ?>
		<tr>
			<td class='menu-no'><?=$i?></td>
			<td>
				<span class='select-wrapper'><span class='inner'>
					<?php
					foreach ( $rows as $row ) {
						if ( $extra['menu_'.$i] && $extra['menu_'.$i] == $row['bo_table'] ) {
							$default_value =  $row['bo_subject'];
							break;
						}
						else $default_value = null;
					}
					
					echo $default_value ? $default_value : 'Select Forum';
					?>
				</span></span>
				<span class='select-button'><span class='inner'>
					<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
				</span></span>
				<div class='drop-down-menu'>
					<?php
						foreach ( $rows as $row ) {
							echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
						}
					?>
				</div>
				<input class='hidden-value' type='hidden' name='menu_<?=$i?>' value='<?=$extra['menu_'.$i]?>' />
			</td>
		</tr>
		<?}?>
		<tr>
			<td colspan=2><input type='submit'></td>
		</tr>
	</table>
</div>
</form>