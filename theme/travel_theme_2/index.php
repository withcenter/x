<script src='<?=x::url_theme()?>/js/banner.js' /></script>
	<?	for ( $i = 1, $has_images = 0; $i <= 5 ; $i++) { 
			if( $banner_image = ms::meta( 'travel2banner_'.$i ) ) {
				$has_images++;
				break;
			}
		}
	?>
	<div style='padding: 9px; border: solid 1px #bbbbbb; margin-bottom:10px;'>
		<div class='banner'>
			<?
				if ( $has_images ) {
					$banner_url = ms::meta('img_url');
					for ( $i = 1; $i <= 5 ; $i++) {
						if( !$banner_image = ms::meta( 'travel2banner_'.$i ) ){
							continue;
						}
						if ( $i == 1 ) $first_image = 'selected';
						else $first_image = '';
						echo "<div class='banner-image image_num_$i $first_image'>";
						if ( !$url = ms::meta('travel2banner_'.$i.'_text2') )  $url = "javascript:void(0)";
						$thumb = g::thumbnail_from_image_tag( "<img src='".$banner_url.$banner_image."'>", ms::board_id( etc::domain() ).'_1', 730, 220 );
						echo "<a href='$url' target='_blank'><img src='".$thumb."'>";
						echo "<p class='banner-text'><span class='banner-content'>".cut_str(strip_tags(ms::meta('travel2banner_'.$i.'_text1')),60,'...')."</span></p>";
						echo "<div class='banner-more'>자세히</div>";
						echo "</a></div>";
					}
				}
				else {
					echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
				}
			?>
		</div>
	</div>

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
			<img src='<?=ms::meta('img_url').ms::meta('travel2banner_right')?>' />
		</div>
	</td>
</td></table>
﻿

