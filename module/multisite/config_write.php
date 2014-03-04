<?php
if ( $in['done'] ) {
	foreach ( $in as $key => $value ) {
		if ( $key == 'module' || $key == 'action' || $key == 'done' ) continue;
		else ms::meta($key, $value );
	}
	
	echo "<div class='message'>수정 되었습니다.</div>";
}
?>
<div class='config config-write'>
<div class='config-main-title'><div class='inner'><img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 블로그 API 정보를 입력해 주세요.</div></div>
	<div class='config-wrapper'>
	<div class='config-container'>
	<form method='get'> 
		<input type='hidden' name='module' value='multisite' />
		<input type='hidden' name='action' value='config_write' />
		<input type='hidden' name='done' value=1 />
<?php 
	for ( $i = 1; $i <=3; $i++ ) {?>
		<fieldset class='api-info'>
			<div class='config-title'>API 정보 <?=$i?></div>
			<div class='row'>
				<span class='item4'>API연결 URL</span>
				<input type='text' name='api-end-point<?=$i?>' value='<?=ms::meta('api-end-point'.$i)?>' />
			</div>
			
			<div class='row'>
				<span class='item4'>아이디</span>
				<input type='text' name='api-username<?=$i?>' value='<?=ms::meta('api-username'.$i)?>' />
			</div>
			
			<div class='row'>
				<span class='item4'>API연결 암호</span>
				<input type='text' name='api-password<?=$i?>' value='<?=ms::meta('api-password'.$i)?>' />
			</div>
		</fieldset>
	<? }?>
		<input type='submit' value='업데이트' />
		<div style='clear:right;'></div>
	</form>
</div></div>
</div>