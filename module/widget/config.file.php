<?php
	$o = &$widget_config_form;
	$path = widget_data_path( $code, $o['name'] );
	$url = widget_data_url( $code, $o['name'] );
	
?>
<? if ( file_exists( $path ) ) { ?>
<div class='item'>
	<span class='caption'><?=ln("Uploaded ", "업로드된 ")?> <?=$o['caption']?></span> :
	<img src="<?=$url?>" style="width: 24px; height: 24px;">
	<input type='checkbox' name="<?=$o['name']?>_remove" value='y'><?=ln("Delete Uploaded File", "업로드된 파일 삭제하기")?>
</div>
<? } ?>
<div class='item'>
	<span class='caption'><?=$o['caption']?></span> :
	<input type='file' name='<?=$o['name']?>'>
</div>
