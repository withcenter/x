<?php
	$o = &$widget_config_form;
?>
<div class='item'>
	<span class='caption'><?=$o['caption']?></span><br>
	<textarea name='<?=$o['name']?>' ><?=html_entity_decode(stripslashes( $widget_config[ $o['name'] ] ))?></textarea>
</div>
