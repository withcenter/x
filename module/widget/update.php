<?php

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

<?include module('config.widget')?>





<span class='caption'><?=ln("Subject", "제목")?></span> : 
<?

		$cfgs = x::forums();
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
		
?>

<input type='text' name='bo_table' value="<?=x::config("bo_table.$code")?>" placeholder=" Input bo_table ex) qna"><br>



<span class='caption'><?=ln("Forum Title", "게시판 제목")?></span> : <input type='text' name='bo_subject' value="<?=x::config("bo_subject.$code")?>" placeholder=" Input Forum Subject"><br>


<span class='caption'><?=ln("No. of row", "글 수")?></span> : 
<select name='no'>
	<option value=''>Select No. of Post</option>
	<?
		$v = x::config("no.$code");
		for ( $i = 1; $i <= 15; $i ++ ) {
			if ( $i == $v ) $sel = " selected=1";
			else $sel = '';
	?>
			<option value="<?=$i?>"<?=$sel?>><?=$i?></option>
	<? } ?>
</select>
<br>


<span class='caption'><?=ln("Option", "옵션")?></span> : <input type='text' name='option' value="<?=htmlspecialchars(x::config("option.$code"))?>" placeholder=" Input Option as in JSON . ex) {'a':'b', 'c':4}">
 JSON ( wrap-in " )<br>



<br>


<hr>
<span class='caption'><?=ln('STYLE', '스타일')?> ( CSS )</span><br>
<textarea class='css' name='css' ><?=htmlspecialchars_decode (x::config("css.$code"))?></textarea><br>
</div>
<input type='submit'>
<input type='submit' name='submit_value' value='Submit & Close'>


</form>
</div>
</body>
</html>