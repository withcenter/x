<div class='banner'>

</div>

<div class='images_with_caption_wrapper'>
<?
$latest_bo_table = ms::board_id(etc::domain()).'_1';
$latest_1_output = latest("x-community_3_images_with_caption", $latest_bo_table, 8, 20);
echo $latest_1_output;
?>
</a>
</div>

<div class='bulleted_list'>
	<table width='100%' cellspacing=0 cellpadding=0><tr valign='top'>
	<td width='50%'>
	<?
	$latest_bo_table = ms::board_id(etc::domain()).'_1';
	$latest_1_output = latest("x-community-3-bulleted-list", $latest_bo_table, 14, 20);
	echo $latest_1_output;
	?>
	</td>
	<td width='50%'>
	<?
	$latest_bo_table = ms::board_id(etc::domain()).'_2';
	$latest_1_output = latest("x-community-3-bulleted-list", $latest_bo_table, 14, 20);
	echo $latest_1_output;
	?>
	</td>
	</tr></table>
</div>

<div class='timed_list'>
	<table width='100%' cellspacing=0 cellpadding=0><tr valign='top'>
	<td width='50%'>
	<?
	$latest_bo_table = ms::board_id(etc::domain()).'_1';
	$latest_1_output = latest("x-community-3-timed-list", $latest_bo_table, 11, 20);
	echo $latest_1_output;
	?>
	</td>
	<td width='50%'>
	<?
	$latest_bo_table = ms::board_id(etc::domain()).'_2';
	$latest_1_output = latest("x-community-3-timed-list", $latest_bo_table, 11, 20);
	echo $latest_1_output;
	?>
	</td>
	</tr></table>
</div>
