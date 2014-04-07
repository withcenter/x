<?php
	$o = &$widget_config_form;
?>
<div class='item'>
	<span class='caption'><?=$o['caption']?></span> :
	<input type='checkbox' name='<?=$o['name']?>' value="_blank" <? if ( $widget_config[ $o['name'] ] == '_blank' ) echo "checked=1"; ?>>
	<?=$o['comment']?>
</div>
