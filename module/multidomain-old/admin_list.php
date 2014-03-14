<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/multidomain/multidomain.css' />
<script src='<?=x::url()?>/module/multidomain/multidomain.js'></script>
<?php
	$domains = md::config();
	
?>

<div class='admin-list'>
	<div class='title'>Multi Domain Setting</div>
	<a class='add-new-site' href='<?=md::url_add()?>'>Add new site.</a>
	<div style='clear:right;'></div>


	<table cellpadding=0 cellspacing=0 width='100%' class='admin-list-table'>
		<tr valign='top' class='header'>
			<td>No.</td>
			<td>DOMAIN</td>
			<td align='center'>Priority</td>
			<td align='center'>THEME</td>
			<td align='center'>SETTING</td>
			<td align='center'>DELETE</td>
		</tr>
		<?php
			$i = 0;
			foreach ( $domains as $domain ) { 
				if ( $i % 2 == 1 ) $background='background';
				else $background = null;
				$i++;
			?>
		<tr valign='top' class='row <?=$background?>'>
			<td><b><?=$domain['idx']?></b></td>
			<td><b><?=$domain['domain']?></b></td>
			<td align='center'><?=$domain['priority']?></td>
			<td align='center'><?=$domain['theme']?></td>
			<td align='center'>
				<a href='<?=md::url_config($domain['idx'])?>'>
					<img src='<?=x::url()?>/module/multisite/img/setting.png' />
				</a>
			</td>
			<td align='center'>
				<a href="<?=md::url_delete($domain['idx'])?>" onclick="return confirm('Do you want to delete - <?=$domain[domain]?>?');">
					<img src='<?=x::url()?>/module/multisite/img/trashbin.png' />
				</a>
			</td>
		</tr>
		<? }?>
	</table>
</div>