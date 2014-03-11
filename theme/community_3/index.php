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
					$banner_num = 1;
					for ( $i = 1; $i <= 5 ; $i++) {
						if( !$banner_image = ms::meta( 'com3banner_'.$i ) ){
							continue;
						}
						if ( $i == 1 ) $first_image = 'selected';
						else $first_image = '';
						echo "<div class='banner-image image_num_$banner_num $first_image'>";
						if ( !$url = ms::meta('com3banner_'.$i.'_text2') )  $url = "javascript:void(0)";
						echo "<a href='$url' target='_blank'><img src='".$banner_url.$banner_image."'></a>";
						echo "<span class='banner-content'><p class='banner-text'>".cut_str(strip_tags(ms::meta('com3banner_'.$i.'_text1')),50,'...')."</p></span>";
						echo "<div class='banner-more'><a href='$url' target='_blank'>자세히 &gt;</a></div>";
						echo "</div>";
						$banner_num++;
					}
				}
				else {
					echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
				}
			?>
		</div>

<div class='images_with_caption_wrapper'>
<?
$latest_bo_table = bo_table(1);
$latest_1_output = latest("x-community_3_images_with_caption", $latest_bo_table, 4, 20);
echo $latest_1_output;
?>
</div>

<div class='timed_list'>
		<div class='left'>
			<?
			$latest_bo_table = ms::board_id(etc::domain()).'_2';
			if ( g::forum_exist( $latest_bo_table ) ) {
				$option = array(
					'no' => 4,
					'icon' => x::url_theme()."/img/notes.png"
				);
				$latest_1_output = latest("x-community-3-timed-list", bo_table(2), 5, 30, $cache_time=1, $option);
				echo $latest_1_output;
			}
			?>
		</div>
		<div class='right'>
			<?
			$latest_bo_table = ms::board_id(etc::domain()).'_3';
			if ( g::forum_exist( $latest_bo_table ) ) {
				$option = array(
					'no' => 4,
					'icon' => x::url_theme()."/img/notes.png"
				);
				$latest_1_output = latest("x-community-3-timed-list", bo_table(3), 5, 30, $cache_time=1, $option);
				echo $latest_1_output;
			}
			?>
		</div>
		<div style='clear:both'></div>
</div>

<div class='timed_list_with_images'>
	<div class='left'>
		<?
			$option = array(
				'no' => 4,
				'icon' => x::url_theme()."/img/newspaper2.png"
			);
			echo latest("x-community-3-timed-list-with-images", bo_table(4), 4, 50, $cache_time=1, $option);
			
		?>
	</div>
	<div class='right'>
		<?
		$latest_bo_table = ms::board_id(etc::domain()).'_5';
		if ( g::forum_exist( $latest_bo_table ) ) {
			$option = array(
				'no' => 4,
				'icon' => x::url_theme()."/img/newspaper2.png"
			);
			$latest_1_output = latest("x-community-3-timed-list-with-images", bo_table(5), 4, 50, $cache_time=1, $option);
			echo $latest_1_output;
		}
		?>
	</div>
</div>
