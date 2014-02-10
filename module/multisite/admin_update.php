<?php
	$domain_update_value = ms::get("$idx");
	$domainexplode = explode(".",$domain_update_value['domain']);
?>
<div class='create-site'>
<h1> Update for <?=$domain_update_value['domain']?>.<?=etc::base_domain()?> Site </h1>
<form action='?'>
	<input type='hidden' name='module' value='multisite'>
	<input type='hidden' name='action' value='admin_update_submit'>
	<input type='hidden' name='idx' value=<?=$idx?>>
	<div>Domain: http://<input type='text' name='sub_domain' value='<?=$domainexplode[0]?>'>.<?=etc::base_domain()?></div>
	<div>Site Title: <input type='text' name='title' value='<?=$domain_update_value['title']?>'></div>
	<input type='submit' value='Update Site' onclick="return confirm('Are you sure you want to update your Site?');">
</form>

</div>
 