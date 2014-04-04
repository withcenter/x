

<?
	$no = $widget_config_form_name;
	for ( $i=1; $i<=$no; $i ++ ) {
?>

<div class='item'>
	<span class='caption'><?=ln('Forum', '게시판')?> <?=$i?></span> : 
	<input type='text' name='forum<?=$i?>' ><?=htmlspecialchars_decode ( $widget_config["forum$i"] )?>
	
</div>
<? } ?>
