<?php
/**
 *
 */
	load_widget_config( $widget_config['code'] );
	x::hook("widget_begin: code=$widget_config[code], name=$widget_config[name]");
?>
<div class="widget" code="<?=$widget_config['code']?>" name="<?=$widget_config['name']?>">
	<?php
		include x::dir() . "/widget/$widget_config[name]/$widget_config[name].php";
	?>
</div>
<?php x::hook("widget_end"); ?>
	