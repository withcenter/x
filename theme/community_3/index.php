<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/banner.css' />
<script src='<?=x::url_theme()?>/js/banner.js' /></script>
	<?	for ( $i = 1, $has_images = 0; $i <= 5 ; $i++) { 
			if( $banner_image = ms::meta( 'com3banner_'.$i ) ) {
				$has_images++;
				break;
			}
		}
	?>
		<div class='banner'>
			<?
				if ( $has_images ) {
					$banner_url = ms::meta('img_url');
					for ( $i = 1; $i <= 5 ; $i++) {
						if( !$banner_image = ms::meta( 'com3banner_'.$i ) ){
							continue;
						}
						if ( $i == 1 ) $first_image = 'selected';
						else $first_image = '';
						echo "<div class='banner-image image_num_$i $first_image'>";
						if ( !$url = ms::meta('com3banner_'.$i.'_text2') )  $url = "javascript:void(0)";
						$thumb = g::thumbnail_from_image_tag( "<img src='".$banner_url.$banner_image."'>", ms::board_id( etc::domain() ).'_1', 748, 238 );
						echo "<a href='$url' target='_blank'><img src='".$thumb."'>";
						echo "<p class='banner-text'><span class='banner-content'>".cut_str(strip_tags(ms::meta('com3banner_'.$i.'_text1')),60,'...')."</span></p>";
						echo "<div class='banner-more'>MORE &gt;</div>";
						echo "</a></div>";
					}
				}
				else {
					echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
				}
			?>
		</div>

<div class='images_with_caption_wrapper'>
<?
$latest_bo_table = ms::board_id(etc::domain()).'_1';
$latest_1_output = latest("x-community_3_images_with_caption", $latest_bo_table, 4, 20);
echo $latest_1_output;
?>
</div>

<div class='timed_list'>
	<table width='100%' cellspacing=0 cellpadding=0><tr valign='top'>
	<td class='left' width='50%'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_2';
		if ( g::forum_exist( $latest_bo_table ) ) {
			$latest_1_output = latest("x-community-3-timed-list", $latest_bo_table, 5, 23, $cache_time=1, x::url_theme()."/img/notes.png");
			echo $latest_1_output;
		}
		?>
	</td>
	<td class='right' width='50%'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_3';
		if ( g::forum_exist( $latest_bo_table ) ) {
			$latest_1_output = latest("x-community-3-timed-list", $latest_bo_table, 5, 23, $cache_time=1, x::url_theme()."/img/chat_icon.png");
			echo $latest_1_output;
		}
		?>
	</td>
	</tr></table>
</div>

<div class='timed_list_with_images'>
	<table width='100%' cellspacing=0 cellpadding=0><tr valign='top'>
	<td width='50%'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_4';
		if ( g::forum_exist( $latest_bo_table ) ) {
			$latest_1_output = latest("x-community-3-timed-list-with-images", $latest_bo_table, 4, 50, $cache_time=1, x::url_theme()."/img/2papers.png");
			echo $latest_1_output;
		}
		?>
	</td>
	<td width='50%' class='right'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			$latest_1_output = latest("x-community-3-timed-list-with-images", $latest_bo_table, 4, 50, $cache_time=1, x::url_theme()."/img/newspaper.png");
			echo $latest_1_output;
		}
		?>
	</td>
	</tr></table>
</div>
