<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/index.css' />

<table width='100%' cellpadding=0 cellspacing=0><tr valign='top'>
	<td width='530'>
		<div class='travel_images_with_caption_wrapper'>
			<?
			$latest_bo_table = ms::board_id(etc::domain()).'_2';
			$latest_1_output = latest("x-travel_2_images_with_caption", $latest_bo_table, 9, 20);
			echo $latest_1_output;
			?>
		</div>
	</td>
	<td width='220'>
		<div class='travel_posts_with_image_right'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_2';
		$latest_1_output = latest("x-travel_2_posts_with_image_right", $latest_bo_table, 5, 50, $cache_time=1, x::url_theme()."/img/chat_icon2.png");
		echo $latest_1_output;
		?>
		</div>
		<div class='travel_2_timezone'>
			<div class='header'><img src='<?=x::url_theme()?>/img/earth.png'/><span class='title'>TIMEZONE</span></div>
			<?
			$old_timezone = date_default_timezone_get();
			date_default_timezone_set("Asia/Manila");
			?>
			Philippines
			<br/>			
			<?=date('Y m d A h:i:s')?>
			<?date_default_timezone_set($old_timezone);?>
			<br>
			Korea
			<br/>			
			<?=date('Y m d A h:i:s')?>
		</div>
		<div class='travel_2_right_banner'>
			
		</div>
	</td>
</td></table>