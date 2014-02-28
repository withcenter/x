<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/banner.css' />
<script src='<?=x::url_theme()?>/js/banner.js' /></script>
	<?	for ( $i = 1, $has_images = 0; $i <= 5 ; $i++) { 
			if( $banner_image = ms::meta( 'travel2banner_'.$i ) ) {
				$has_images++;
				break;
			}
		}
	?>
	<div style='padding: 9px; border: solid 1px #bbbbbb;'>
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
