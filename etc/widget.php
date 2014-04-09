<?php
/**
 *
 */
	load_widget_config( $widget_config['code'] );
	
	$widget_script = x::dir() . "/widget/$widget_config[name]/$widget_config[name].php";
	if ( ! file_exists( $widget_script ) ) {
		echo "<div style='margin-bottom: 1em; padding: 1em; border: 1px solid red;'>No widget script : $widget_config[name]</div>";
		return;
	}
	
	x::hook("widget_begin: code=$widget_config[code], name=$widget_config[name]");
?>
<div class="widget-admin" code="<?=$widget_config['code']?>" name="<?=$widget_config['name']?>">
	<?php
		include $widget_script;
	?>
</div>
<?php x::hook("widget_end"); ?>
	