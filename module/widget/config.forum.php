<?php
	$from = 1;
	$w = $widget_config_form;
	if ( isset($w['from']) && $w['to'] ) {
		$from = $w['from'];
		$to = $w['to'];
	}
	else $to = $w['no'];
	if ( empty($to) ) $to = 1;
	for ( $i=$from; $i<=$to; $i ++ ) {
?>

<div class='item forum'>
	<span class='caption'><?=ln('Forum', '게시판')?> ID</span> : 
	<input type='text' name='forum<?=$i?>' value="<?=htmlspecialchars_decode ( $widget_config["forum$i"] )?>" placeholder="<?=ln("Input a forum ID", "게시판 ID 를 입력하십시오.")?>">
	<select>
		<option value=''><?=ln("Select a Forum", "게시판 선택")?></option>
		<? foreach( x::forums() as $forum ) { ?>
			<option value="<?=$forum['bo_table']?>"><?=$forum['bo_subject']?></option>
		<? } ?>
	</select>
</div>
<? } ?>
