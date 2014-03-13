<?php
	$ms = x::site("$idx");
	list($second, $domain) = explode(".",$ms['domain'], 2);
?>
<div class='create-site'>
<h1> Update for <?=$ms['domain']?> Site </h1>
<form action='?'>
	<input type='hidden' name='module' value='multisite'>
	<input type='hidden' name='action' value='admin_update_submit'>
	<input type='hidden' name='idx' value=<?=$idx?>>
	<div>Domain: http://<input type='text' name='sub_domain' value='<?=$second?>'>.<?=etc::base_domain()?></div>
	<div>Site Title: <input type='text' name='title' value='<?=$ms['title']?>'></div>
	
	<div>
		STATUS:
			<input type='radio' name='status' value='open' <? if ( x::meta_get($ms['domain'], 'status') != 'close' ) echo 'checked=1';?>> OPEN,
			<input type='radio' name='status' value='close' <? if ( x::meta_get($ms['domain'], 'status') == 'close' ) echo 'checked=1';?>> CLOSE
	</div>
	<input type='submit' value='Update Site' onclick="return confirm('Are you sure you want to update your Site?');">
</form>

</div>
 