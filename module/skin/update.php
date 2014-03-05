<?php

	if ( $submit ) {
		x::config("bo_table.$code", $bo_table);
		x::config("bo_subject.$code", $bo_subject);
		x::config("css.$code", $_POST['css'] );
		if ( $submit_value == 'Submit & Close' ) {
			echo "<script>parent.location.reload();</script>";
			exit;
		}
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

<div class='layout'>

<div class='page-title'>Skin Update</div>

<? if ( $submit ) { ?>
<div class='submitted'>Skin Information Updated !</div>
<? } ?>


<!--<span class='caption'>Code</span> : <?=$code?><br>-->


<div class='content'>
<form action='?' method='POST'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>'>
<input type='hidden' name='code' value='<?=$code?>'>
<input type='hidden' name='theme' value='n'>
<input type='hidden' name='submit' value='1'>

<span class='caption'>Forum ID</span> : 
<?
	if ( ms::exist() ) {
		$cfgs = ms::forums();
		if ( ! empty( $cfgs ) ) {
?>
<select name='select_bo_table'>
	<option value=''>Select Forum ID</option>
	<? foreach ( $cfgs as $c ) { ?>
		<option value="<?=$c['bo_table']?>"><?=$c['bo_subject']?></option>
	<? } ?>
</select>
<script>
$(function(){
	$("[name='select_bo_table']").change(function(){
		$("[name='bo_table']").val($(this).val());
	});
});
</script>
<?
		}
	}
?>

<input type='text' name='bo_table' value="<?=x::config("bo_table.$code")?>" placeholder=" Input bo_table ex) qna"><br>
<span class='caption'>Forum Title</span> : <input type='text' name='bo_subject' value="<?=x::config("bo_subject.$code")?>" placeholder=" Input Forum Subject"><br>
<hr>
<span class='caption'>STYLE ( CSS )</span><br>
<textarea class='css' name='css' ><?=htmlspecialchars_decode (x::config("css.$code"))?></textarea><br>
</div>
<input type='submit'>
<input type='submit' name='submit_value' value='Submit & Close'>


</form>
</div>
</body>
</html>