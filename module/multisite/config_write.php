<?php
if ( $in['done'] ) {
	foreach ( $in as $key => $value ) {
		if ( $key == 'module' || $key == 'action' || $key == 'done' ) continue;
		else ms::meta($key, $value );
	}
	
	echo "<div class='message'>수정 되었습니다.</div>";
}
?>
<div class='config-write'>
	<form method='get'> 
		<input type='hidden' name='module' value='multisite' />
		<input type='hidden' name='action' value='config_write' />
		<input type='hidden' name='done' value=1 />
		<div class='row'>
			<span class='item4'>API연결 URL</span>
			<input type='text' name='api-end-point' value='<?=ms::meta('api-end-point')?>' />
		</div>
		
		<div class='row'>
			<span class='item4'>아이디</span>
			<input type='text' name='api-username' value='<?=ms::meta('api-username')?>' />
		</div>
		
		<div class='row'>
			<span class='item4'>API연결 암호</span>
			<input type='text' name='api-password' value='<?=ms::meta('api-password')?>' />
		</div>
		<input type='submit' value='업데이트' />
		<div style='clear:right;'></div>
	</form>
</div>