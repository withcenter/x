<?php
if ( $in['done'] ) {
	foreach ( $in as $key => $value ) {
		if ( $key == 'module' || $key == 'action' || $key == 'done' ) continue;
		else meta_set($key, $value );
	}
	echo "<div class='message'>수정 되었습니다.</div>";
}
?>
<div class='config config-write'>
<div class='config-main-title'>
	<div class='inner'>
		<span class='config-title-info'><img src='<?=module('img/direction.png')?>'> 블로그 API 정보를 입력해 주세요.</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button inner-title' page = 'google_doc_blog_api' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
		</span>
	</div>
</div>
		<div class='hidden-google-doc google_doc_blog_api'>	
		</div>
	<div class='config-wrapper'>
	<form method='get'> 
		<input type='hidden' name='module' value='multi' />
		<input type='hidden' name='action' value='config_write' />
		<input type='hidden' name='done' value=1 />
<?php 
	for ( $i = 1; $i <=3; $i++ ) {?>
			<div class='config-title'>API 정보 <?=$i?></div>
		<fieldset class='api-info'>
	
			<div class='row'>
				<span class='item4'>API연결 URL</span>
				<input type='text' name='api-end-point<?=$i?>' value='<?=meta('api-end-point'.$i)?>' />
			</div>
			
			<div class='row'>
				<span class='item4'>아이디</span>
				<input type='text' name='api-username<?=$i?>' value='<?=meta('api-username'.$i)?>' />
			</div>
			
			<div class='row'>
				<span class='item4'>API연결 암호</span>
				<input type='text' name='api-password<?=$i?>' value='<?=meta('api-password'.$i)?>' />
			</div>
		</fieldset>
	<? }?>
		<input type='submit' value='업데이트' />
		<div style='clear:right;'></div>
	</form>
</div>
</div>