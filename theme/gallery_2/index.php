<script src='<?=x::url_theme()?>/js/banner.js' /></script>

	<?
	
		$banners = array();
		$container_width = 0;
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
				$container_width = $container_width + 970;
				$banners[] = array(
					'src' => x::url_file( "banner$i" ),
					'href' => x::meta( "banner{$i}_url" ),
					'subject' => x::meta("banner{$i}_subject"),
					'content' => x::meta("banner{$i}_content")
				);
			}
		}
		
		$total_banners = count($banners);
	?>	
		<div class='banner' total_banners="<?=$total_banners?>">
			<div class='inner' style="position: relative; height: 318px; width: 968px;">
				<div class='images-container' style='width: <?=$container_width?>px' container-width='<?=$container_width?>'>
				<?
					
					if ( $banners ) {
						$selected = 0;
						foreach ( $banners as $banner ) {					
							if ( ! $selected ++ ) $first_image = 'selected';
							else $first_image = '';
							
							if ( !$url = $banner['href'] ) $url = "javascript:void(0)";
							
							echo "<div class='banner-image $first_image' image_num='$selected'>";
							echo "<a href='$url' target='_blank'><img src='$banner[src]''></a>";
							echo "<a href='$url' target='_blank'><span class='banner-content'><p class='banner-text'><div class='post-subject'>".cut_str(strip_tags($banner['subject']),50,'...')."</div><div class='post-content'>".cut_str(strip_tags($banner['content']),200,'...')."</div></p></span></a>";
							echo "<div class='banner-more'><a href='$url' target='_blank'>자세히 &gt;</a></div>";
							echo "</div>";						
						}
					}
					else {
						echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
					}
				?>
				</div>
				<div class='banner-pagination'>
					<? for($i=1; $i<=$total_banners; $i++) {?>
						<span class='page_num num_<?=$i?>'><?=$i?></span>
					<?}?>
				</div>
				<div class='previous-banner'> s </div>
				<div class='next-banner'> > </div>
			</div>
		</div>

<div class='posts-container'>
	<div class='left-posts-container'>
		<?=latest( 'x-latest-left-gallery', bo_table(2) , 3, 40 )?>
	</div>
	<div class='right-posts-container'>
		<div class='right-panel-posts'>
			<div class='right-posts-1'>
				<?=latest( 'x-latest-gallery-posts', bo_table(1), 10, 40 )?>
			</div>
			<div class='right-posts-2'>
				<?=latest( 'x-latest-gallery-posts', bo_table(4), 5, 40 )?>
			</div>
		</div>
		<div class='right-gallery-post'>
			<?=latest( 'x-latest-right-gallery', bo_table(5) , 1, 40 )?>
		</div>
		<div style='clear: left'></div>
	</div>
	<div style='clear: left'></div>
</div>


