<link rel='stylesheet' type='text/css' href='<?=module("$module.css")?>' />
<script>
$(function(){
	$("select[name='status']").change(function(){
		$(this).parent().submit();
	});
});
</script>
<div class='admin-list'>
	<div class='title'>Site List</div>
	<a class='add-new-site' href='?module=<?=$module?>&action=admin_site_add_update'>Add New Site</a>
	<div style='clear:right;'></div>

	<table cellpadding=0 cellspacing=0 width='100%' class='admin-list-table'>
		<tr valign='top' class='header'>
			<td>Domain</td>
			<td>Owner</td>
			<td>Site Name</td>
			<td>Theme</td>
			<td align='center'>Status</td>
			<td align='center'>Forum</td>
			<td align='center'>Post</td>
			<td align='center'>Setting</td>
			<td align='center'>Delete</td>
		</tr>
		<?php
			$sites = db::rows("SELECT * FROM x_site_config ORDER BY good DESC, domain ASC");
			$hosts = array();
			foreach ( $sites as $site ) {
				$hosts[] = $site['domain'];
				if ( $i % 2 == 1 ) $background='background';
				else $background = null;
				$i++;
		?>
		<tr valign='top' class='row <?=$background?>'>
			<td><a name="<?=$site['domain']?>"></name><a href='<?=url_site($site['domain'])?>' target='_blank'><?=$site['domain']?></a></td>
			<td><?=$site['mb_id']?></td>
			<td><?=x::meta_get($site['domain'], 'title')?></td>
			<td><?=x::meta_get($site['domain'], 'theme')?></td>
			<td>
				<form action='?'>
					<input type='hidden' name='module' value="<?=$module?>">
					<input type='hidden' name='action' value="admin_status_update_submit">
					<input type='hidden' name='domain' value="<?=$site['domain']?>">
					<select name='status'>
						<option value='<?=x::meta_get($site['domain'], 'status')?>'><?=x::meta_get($site['domain'], 'status')?></option>
						<option value='open'>open</option>
						<option value='close'>close</option>
					</select>
				</form>
				
			</td>
			<td align='center'><?=x::forum_count( $site['domain'] )?></td>
			<td align='center'><?=x::count_post(x::forum_ids( $site['domain'] ) )?></td>
			<td align='center'>
				<a href='?module=<?=$module?>&action=admin_site_add_update&idx=<?=$site['idx']?>'>
					<img src='<?=module('/img/setting.png')?>' />
				</a>
			</td>
			<td align='center'>
				<a href="?module=<?=$module?>&action=admin_site_delete_submit&idx=<?=$site['idx']?>" onclick="return confirm('Do you want to delete - <?=$site[domain]?>?');">
					<img src='<?=module('/img/trashbin.png')?>' />
				</a>
			</td>
		</tr>
		<?
			}

		?>
	</table>
</div>

<p>&nbsp;</p><p>&nbsp;</p>
<h1>Partial Domain Matching: Hosts that are not listed above but have theme.</h1>
<table>
	<tr>
		<td>Domain</td>
		<td>Theme</td>
		<td>Delete</td>
	</tr>
<?php

	$rows = db::rows("SELECT * FROM x_config WHERE code='theme'");
	foreach ( $rows as $row ) {
		if ( ! in_array( $row['key'], $hosts ) ) {
			echo "
				<tr>
					<td>$row[key]</td>
					<td>$row[value]</td>
					<td><a href='?module=$module&action={$action}_submit&domain=$row[key]'>Delete</a></td>
				</tr>
			";
		}
	}
?>

</table>