<?php
	if ( ! admin() ) {
		jsAlert("You are not admin");
		echo "<script>parent.close_layer_popup();</script>";
		exit;
	}
	load_widget_config($code, $in['name']);
	$xml = &$widget_config['xml'];

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
<script src="js/default.js"></script>
</head>
<body>

<div class='layout'>

<div class='page-title'>
	<?=ln("Widget Update", "위젯 업데이트")?> - 
	<span class='name'><?=$xml['name'][L]?></span>
	<span class='help'><?=ln('Help', '도움말')?>(?)</span>
</div>

<? if ( $done ) { ?>
<div class='done'>Widget Information Updated !</div>
<? } ?>

<div class='widget-help-box'>
	<div class='category'>
		<span class='caption'><?=ln("Category", "카테고리")?></span><span class='sep'>:</span><span class='value'><?=$xml['category']['main']?>
		<?if ( ! empty($xml['category']['sub']) ) echo ' -&gt; ' . $xml['category']['sub'];?>
	</span></div>
	<div class='version'><span class='caption'><?=ln("Version", "버젼")?></span><span class='sep'>:</span><span class='value'><?=$xml['version']?></span></div>
	<div class='author'><span class='caption'><?=ln("Author", "개발자")?></span><span class='sep'>:</span><span class='value'><?=$xml['author']?></span></div>
	<div class='email'><span class='caption'><?=ln("Email", "이메일")?></span><span class='sep'>:</span><span class='value'><?=$xml['email']?></span></div>
	<div class='homepage'><span class='caption'><?=ln("homepage", "홈페이지")?></span><span class='sep'>:</span><span class='value'><?=$xml['homepage']?></span></div>
	<div class='demo'><span class='caption'><?=ln("Demo", "데모 사이트")?></span><span class='sep'>:</span><span class='value'><?=$xml['demo']?></span></div>
	<div class='detail'><span class='caption'><?=ln("Details", "설명")?></span><span class='sep'>:</span><span class='value'><?=nl2br($xml['detail'][L])?></span></div>
</div>



<!--<span class='caption'>Code</span> : <?=$code?><br>-->


<div class='content config'>

<form action='?' method='POST' enctype='multipart/form-data'>

<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>
<input type='hidden' name='code' value='<?=$code?>'>
<input type='hidden' name='widget-extra-display' value='<?=$widget_config['widget-extra-display']?>'>

<?php

	include module('config.widget');
	include widget_config();
?>


</div>
<input id='submit-only' type='submit'>
<input type='submit' name='submit_value' value='Submit & Close'>


</form>
</div>
</body>
</html>