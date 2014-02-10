<?php
	$domains = md::config();
	
?>

<h1>Multi Domain Setting</h1>

<div>LIST | <a href='<?=md::url_add()?>'>Add new site.</a></div>


<table>
	<tr>
		<td>No.</td>
		<td>DOMAIN</td>
		<td>Priority</td>
		<td>THEME</td>
	</tr>
	<? foreach ( $domains as $domain ) { ?>
	<tr>
		<td><b><?=$domain['idx']?></b></td>
		<td><b><?=$domain['domain']?></b></td>
		<td><?=$domain['priority']?></td>
		<td><?=$domain['theme']?></td>
		<td><a href='<?=md::url_config($domain['idx'])?>'>SETTING</a></td>
		<td><a href="<?=md::url_delete($domain['idx'])?>" onclick="return confirm('Do you want to delete - <?=$domain[domain]?>?');">DELETE</a></td>
	</tr>
	<? }?>
</table>