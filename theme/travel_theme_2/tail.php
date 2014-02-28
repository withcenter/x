		</div> <!-- container -->
<div style='clear:both;'></div>
<div class='lower-posts'>
	<table width='100%' cellpadding=0 cellspacing=0><tr valign='top'>
	<td width=310>
		<div class='travel_left_posts'>
		<?
			$latest_bo_table = ms::board_id(etc::domain()).'_2';
			$latest_1_output = latest("x-latest-travel-lower-posts-with-image", $latest_bo_table, 5, 20);
			echo $latest_1_output;
		?>
		</div>
	</td>
	<td width=340>
		<div class='travel_middle_posts'>		
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_2';
		$latest_1_output = latest("x-latest-travel-lower-posts", $latest_bo_table, 8, 20, $cache_time=1, x::url_theme()."/img/chat_icon3.png");
		echo $latest_1_output;
		?>
		</div>
	</td>
	<td width=320>
		<div class='travel_right_posts'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_3';
		$latest_1_output = latest("x-latest-travel-lower-posts", $latest_bo_table, 8, 20, $cache_time=1, x::url_theme()."/img/chat_icon3.png");
		echo $latest_1_output;
		?>
		</div>
	</td>
	</tr></table>
</div>
	</div> <!-- inner -->
</div> <!-- layout -->

