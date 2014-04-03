<?php
/**
 *
 *  @note $wo is available in all the widget.
 *		It has code, name and configuration.
 *
 */
	$wo = &$widget_option;
?>
<div class="widget">
	<?php include x::dir() . "/widget/$wo[name]/$wo[name].php"; ?>
</div>

	