<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/banner.css' />
<script src='<?=x::url_theme()?>/js/banner.js' /></script>

	<?
	
	
	
		$banners = array();
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
				$banners[] = array(
					'src' => x::url_file( "banner$i" ),
					'href' => x::meta( "banner{$i}_url" ),
					'text' => x::meta("banner{$i}_text")
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
						
						if ( !$url = $banner['href'] ) $url = "javascript:void(0)";
						
						echo "<div class='banner-image image_num_$selected $first_image'>";
						echo "<a href='$url' target='_blank'><img src='$banner[src]'></a>";
						echo "<a href='$url' target='_blank'><span class='banner-content'><p class='banner-text'>".cut_str(strip_tags($banner['text']),50,'...')."</p></span></a>";
						echo "<div class='banner-more'><a href='$url' target='_blank'>자세히 &gt;</a></div>";
						echo "</div>";						
					}
				}
				else {
					echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
				}
			?>
		</div>

<div class='images_with_caption_wrapper'>
<?
	include widget(
		array(
			'code'		=> 'community-3-images-with-caption',
			'name'		=> 'community-3-images-with-caption',
			'default_forum_id'	=> bo_table(1),
			'git'		=> 'https://github.com/x-widget/community-3-images-with-caption',
		)
	);
?>
</div>

<div class='timed_list'>
		<div class='left'>
			<?			
				include widget(
					array(
						'code'		=> 'community-3-timed-list-left',
						'name'		=> 'community-3-timed-list',
						'default_forum_id'	=> bo_table(2),
						'git'		=> 'https://github.com/x-widget/community-3-timed-list',
					)
				);			
			?>
		</div>
		<div class='right'>
			<?
				include widget(
					array(
						'code'		=> 'community-3-timed-list-right',
						'name'		=> 'community-3-timed-list',
						'default_forum_id'	=> bo_table(3),
						'git'		=> 'https://github.com/x-widget/community-3-timed-list',
					)
				);
			?>
		</div>
		<div style='clear:both'></div>
</div>

<div class='timed_list_with_images'>
	<div class='left'>
		<?
			include widget(
				array(
					'code'		=> 'community-3-timed-list-with-images-left',
					'name'		=> 'community-3-timed-list-with-images',
						'default_forum_id'	=> bo_table(4),
					'git'		=> 'https://github.com/x-widget/community-3-timed-list-with-images',
				)
			);
		?>
	</div>
	<div class='right'>
		<?
			include widget(
				array(
					'code'		=> 'community-3-timed-list-with-images-right',
					'name'		=> 'community-3-timed-list-with-images',
						'default_forum_id'	=> bo_table(5),
					'git'		=> 'https://github.com/x-widget/community-3-timed-list-with-images',
				)
			);
		?>
	</div>
</div>
