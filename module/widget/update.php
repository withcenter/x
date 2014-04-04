<?php
	if ( $submit ) {
		meta_set( "widget_config.$code", string::scalar( $in ) );
		if ( $submit_value == 'Submit & Close' ) {
			echo "<script>parent.location.reload();</script>";
			return;
		}
		else {
			return jsGo("?module=$module&action=$action&code=$code&theme=n&done=1");
		}
	}
	load_widget_config($code, $in['name']);
	
	
	
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
<script src="<?=module('update.js')?>"></script>

</head>
<body>

<div class='layout'>

<div class='page-title'><?=ln("Widget Update", "위젯 업데이트")?></div>

<? if ( $done ) { ?>
<div class='done'>Widget Information Updated !</div>
<? } ?>




<!--<span class='caption'>Code</span> : <?=$code?><br>-->


<div class='content config'>
<form action='?' method='POST'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>'>
<input type='hidden' name='code' value='<?=$code?>'>
<input type='hidden' name='widget-extra-display' value='<?=$widget_config['widget-extra-display']?>'>
<input type='hidden' name='theme' value='n'>
<input type='hidden' name='submit' value='1'>

<?php
	unset($submit);
	include module('config.widget');
	include x::dir() . "/widget/$widget_config[name]/config.php";
?>


</div>
<input type='submit'>
<input type='submit' name='submit_value' value='Submit & Close'>


</form>
</div>
</body>
</html>