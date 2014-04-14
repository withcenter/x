<?php
/**
 *
 */
	load_widget_config( $widget_config['code'] );
?>
<div class="widget-admin" code="<?=$widget_config['code']?>" name="<?=$widget_config['name']?>">
<?	
	

	
	
	$widget_script = x::dir() . "/widget/$widget_config[name]/$widget_config[name].php";
	
	if ( ! file_exists( $widget_script ) ) {
		echo "
			<div style='margin-bottom: 1em; padding: 1em; border: 1px solid red; overflow:hidden; word-break: break-all; line-height: 140%;'>
				No widget : $widget_config[name]
		";
		if ( $widget_config['git'] ) {
			$url = "?module=update&action=admin_install&type=widget&source_link=" . urlencode( $widget_config['git'] );
			echo "
					<br>
					<a href='$url'>INSTALL : $widget_config[git]</a>
			";
		}
		echo "</div>";
		
	}
	else {
	
	x::hook("widget_begin: code=$widget_config[code], name=$widget_config[name]");
?>

	<?php
		include $widget_script;
	?>
<?php x::hook("widget_end"); ?>
<?
	}
?>

</div>
	