<?php

	if ( $submit ) {
		x::config("bo_table.$code", $bo_table);
		x::config("bo_subject.$code", $bo_subject);
		x::config("css.$code", $_POST['css'] );
	}
	

?><!doctype html>
<html>
<head>
<title>TITLE</TITLE>
<link rel="stylesheet" href="<?=x::url()?>/module/skin/update.css">
<script>
var g5_url       = "<?php echo G5_URL ?>";
</script>
	<!--[if lt IE 9]>
		<script type='text/javascript' src='http://test8.work.org/g5-5.0b24/x/js/jquery-1.11.0.min.js'></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type='text/javascript' src='http://test8.work.org/g5-5.0b24/x/js/jquery-2.1.0.min.js'></script>
	<!--<![endif]-->
</head>
<body>


<? if ( $submit ) { ?>
<div class='submitted'>Skin Information Updated !</div>
<? } ?>
code : <?=$code?>
<br>


<form action='?' method='POST'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>'>
<input type='hidden' name='code' value='<?=$code?>'>
<input type='hidden' name='theme' value='n'>
<input type='hidden' name='submit' value='1'>

Forum ID : <input type='text' name='bo_table' value="<?=x::config("bo_table.$code")?>"> ( bo_table )<br>
Forum Title : <input type='text' name='bo_subject' value="<?=x::config("bo_subject.$code")?>"> ( bo_subject )<br>
STYLE ( CSS )<br>
<textarea class='css' name='css' ><?=htmlspecialchars_decode (x::config("css.$code"))?></textarea><br>

<input type='submit'>


</form>
</body>
</html>