<?php
	if ( $submit ) {
		meta_set( "widget_config.$code", string::scalar( $in ) );
		if ( $submit_value == 'Submit & Close' ) {
			echo "<script>parent.location.reload();</script>";
			exit;
		}
	}
	
	load_widget_config($code);
	
	
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TITLE</TITLE>
<link rel="stylesheet" href="<?=module('update.css')?>">
<script>
var x_url       = "<?=x::url()?>";
</script>
<?=javascript_jquery()?>
</head>
<body>

<div class='layout'>

<div class='page-title'><?=ln("Widget Update", "위젯 업데이트")?></div>

<? if ( $submit ) { ?>
<div class='submitted'>Widget Information Updated !</div>
<? } ?>


<!--<span class='caption'>Code</span> : <?=$code?><br>-->


<div class='content config'>
<form action='?' method='POST'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>'>
<input type='hidden' name='code' value='<?=$code?>'>
<input type='hidden' name='theme' value='n'>
<input type='hidden' name='submit' value='1'>

<?php
	include module('config.widget');
	
?>


</div>
<input type='submit'>
<input type='submit' name='submit_value' value='Submit & Close'>


</form>
</div>
</body>
</html>