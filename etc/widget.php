<?php
/**
 *
 *  @note $wc is available in all the widget.
 *		It has code, name and configuration.
 *
 */
	$wc = &$widget_config;
	x::hook("widget_begin: code=$wc[code], name=$wc[name]");
?>
<div class="widget" code="<?=$wc['code']?>">
	<?php
		include x::dir() . "/widget/$wc[name]/config.php";
		include x::dir() . "/widget/$wc[name]/$wc[name].php";
	?>
</div>
<?php x::hook("widget_end"); ?>
	