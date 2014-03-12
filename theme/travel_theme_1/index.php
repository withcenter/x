		<script src='<?=x::url_theme()?>/js/banner.js' /></script>
<?
	
		$banners = array();
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
				$banners[] = array(
					'src' => x::url_file( "banner$i" ),
					'href' => x::meta( "banner{$i}_url" ),
					'text' => x::meta( "banner{$i}_text" )
				);
			}
		}
		
	?>
		<div class='banner'>
			<?
				if ( $banners ) {
					$selected = 0;
					foreach ( $banners as $banner ) {

						if ( ! $selected ++ ) $first_image = 'selected';
						else $first_image = '';
						
						echo "<div class='banner-image image_num_$selected $first_image'>";
						echo "<a href='$banner[href]' target='_blank'><img src='$banner[src]'></a>";
						echo "<a href='$banner[href]' target='_blank'><span class='banner-content'><p class='banner-text'>".cut_str(strip_tags($banner['text']),50,'...')."</p></span></a>";
						echo "<div class='banner-more'><a href='$banner[href]' target='_blank'>자세히 &gt;</a></div>";
						echo "</div>";

					}
				}
				else {
					echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
				}
			?>
		</div>
		
		<div class ='main-content'>
			<div class='travel_images_with_caption_wrapper'>
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_2';
				if(g::forum_exist($latest_bo_table)){	
					$latest_1_output = latest("x-travel_2_images_with_caption", $latest_bo_table, 6, 20);
					echo $latest_1_output;
				}
				?>
			</div>


			<div class='right-widgets'>
				<div class='travel_posts_with_image_right'>
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_3';
				if(g::forum_exist($latest_bo_table)){	
					$option = array(
									'no' => 3,
									'icon' => x::url_theme()."/img/chat_icon2.png"
					);
					$latest_2_output = latest("x-travel_2_posts_with_image_right", $latest_bo_table, 3, 50, $cache_time=1, $option );
					echo $latest_2_output;
				}
				?>
				</div>
				<div class='travel_2_timezone'>
					<div class='header'><img src='<?=x::url_theme()?>/img/earth.png'/><span class='title'><b>현재 시간</b></span></div>
					<div class='timezones'>
						<?
						$old_timezone = date_default_timezone_get();
						date_default_timezone_set("Asia/Manila");
						?>
						<div class='row first-row'><span class='sub-item'>필리핀</span><?=date('H시 i분 A')?></div>
						
						<?date_default_timezone_set($old_timezone);?>
						
						<div class='row'><span class='sub-item'>한국</span><?=date('H시 i분 A')?></div>
					</div>
				</div>
				<div class='travel_2_right_banner'>
						<?
						$banner_url = ms::meta('img_url');
						$url = ms::meta('travel2banner_right_text1');
						$banner_image = ms::meta( 'travel2banner_right' );
						if ( $banner_image ) {
							echo "<a href='$url' target='_blank'><img src='".$banner_url.$banner_image."'></a>";
						}
						else {?>
							<a href='javascript:void(0)' ><img src='<?=x::url_theme()?>/img/no_side_banner.png'></a>
						<?}?>
				</div>
			</div>
			<div style='clear:both;'></div>
		</div>

		<div class='lower-posts'>
			<div class='travel_left_posts'>		
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_4';
				if(g::forum_exist($latest_bo_table)){	
					$option = array( 
									'no' => 4 ,
									'icon'=> x::url_theme()."/img/folded-paper.png"
								);
					$latest_1_output = latest("x-latest-travel-lower-posts", $latest_bo_table, 4, 20, $cache_time=1, $option );
					echo $latest_1_output;
				}
				?>
			</div>
			<div class='travel_middle_posts'>		
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_5';
				if(g::forum_exist($latest_bo_table)){	
					$option = array( 
									'no' => 4,
									'icon'=> x::url_theme()."/img/folded-paper.png"
								);
				
					$latest_1_output = latest("x-latest-travel-lower-posts", $latest_bo_table, 4, 20, $cache_time=1, $option );
					echo $latest_1_output;
				}
				?>
			</div>
			<div class='travel_right_posts'>		
				<?
				$latest_bo_table = ms::board_id(etc::domain()).'_6';
				if(g::forum_exist($latest_bo_table)){	
					$option = array( 
									'no' => 4,
									'icon'=> x::url_theme()."/img/folded-paper.png"
								);
					$latest_1_output = latest("x-latest-travel-lower-posts", $latest_bo_table, 4, 20, $cache_time=1, $option);
					echo $latest_1_output;
				}
				?>
			</div>
			
				<div style='clear:both;'></div>
		</div>
