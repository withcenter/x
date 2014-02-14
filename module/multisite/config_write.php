<?php
if ( $in['done'] ) {
	foreach ( $in as $key => $value ) {
		if ( $key == 'module' || $key == 'action' || $key == 'done' ) continue;
		else ms::meta($key, $value );
	}
	
	echo "<div class='message'>Updated</div>";
}
?>

<form method='get'> 
	<input type='hidden' name='module' value='multisite' />
	<input type='hidden' name='action' value='config_write' />
	<input type='hidden' name='done' value=1 />
	<div>
		<span class='item'>Api End Point</span>
		<input type='text' name='api-end-point' value='<?=ms::meta('api-end-point')?>' />
	</div>
	<div>
		<span class='item'>Username</span>
		<input type='text' name='api-username' value='<?=ms::meta('api-username')?>' />
	</div>
	<div>
		<span class='item'>API connection Password</span>
		<input type='text' name='api-password' value='<?=ms::meta('api-password')?>' />
	</div>
	<input type='submit' />
</form>