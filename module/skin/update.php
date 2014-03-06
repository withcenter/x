<?php

	if ( $submit ) {
		x::config("bo_table.$code", $bo_table);
		x::config("bo_subject.$code", $bo_subject);
		x::config("no.$code", $no);
		x::config("skin.$code", $skin);
		x::config("css.$code", $_POST['css'] );
		if ( $submit_value == 'Submit & Close' ) {
			echo "<script>parent.location.reload();</script>";
			exit;
		}
	}
	

?><!doctype html>
<html>
<head>
<meta charset="utf-8">
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

<div class='page-title'><?=ln("Skin Update", "스킨 업데이트")?></div>

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

<span class='caption'><?=ln("Forum ID", "게시판 아이디")?></span> : 
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


<span class='caption'><?=ln("Skin", "스킨")?></span> : <input type='text' name='skin' value="<?=x::config("skin.$code")?>" placeholder=" Input Skin Folder Name"><br>
<div class='skin-list'>
<?php
	$dirs = file::getDirs( x::dir() . '/skin/latest' );
	foreach ( $dirs as $dir ) {
		if ( file_exists( x::dir() . "/skin/latest/$dir/preview.png" ) ) $img = "<img src='".x::url()."/skin/latest/$dir/preview.png'>";
		else $img = "No Preview";
		echo "
			<div class='skin'>
				<div class='preview'>$img</div>
				<div class='folder'>$dir</div>
			</div>
		";
	}
?>
<div style='clear:both;'></div>
</div>
<script>
$(function(){
	$("[name='skin']").click(function(){
		$('.skin-list').slideDown('fast');
	});
	$('.skin').click(function(){
		var text = $(this).find('.folder').text();
		$("[name='skin']").val( text );
		$('.skin-list').slideUp('fast');
	});
});
</script>

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