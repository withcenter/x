<?php
	$code = 'site_limit_per_member';
?>
<form action='?'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">

회원 1명 당 사이트 개설 수 : <input type='text' name='<?=$code?>' value="<?=config( $code ) ?>">


<br>
<input type='submit'>

</form>
