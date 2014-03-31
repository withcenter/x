<?php
	$code = 'site_limit_per_member';
?>
<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/<?=$module?>/site.css' />

<div class='admin-site-config'>
<form action='?'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">
<span class='sub-title'>회원 1명 당 사이트 개설 수</span><input type='text' name='<?=$code?>' value="<?=config( $code )?>" placeholder='숫자로 입력해 주세요' >
<input type='submit'>
<div style='clear:right;'></div>
</form>
</div>
