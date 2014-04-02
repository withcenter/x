<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">

<script src='<?=x::url_theme()?>/js/banner.js' /></script>
<?
		$banners = array();
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
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
	
		<div class='banner-container'>
				<?
				$fake_last_image = g::thumbnail_from_image_tag( "<img src='".$banners[count($banners)-1]['src']."'/>;", bo_table(1), 448, 238);
				$fake_last_image_subject = $banners[$total_banners-1]['subject'];
				$fake_last_image_content = $banners[$total_banners-1]['content'];
				$fake_first_image = g::thumbnail_from_image_tag( "<img src='".$banners[0]['src']."'/>;", bo_table(1), 448, 238);
				$fake_first_image_subject = $banners[0]['subject'];
				$fake_first_image_content = $banners[0]['content'];
				?>			
			<img class='height_support_image' src='<?=$fake_first_image?>'/>
			<div class='inner'>			
				<div class='banner'>	
					<div class='banner_holder'>
						<img src='<?=$fake_last_image?>'/>
						<div class='text_content'>
							<div class = 'banner_subject'><?=$fake_last_image_subject?></div>
							<div class = 'banner_content'><?=cut_str($fake_last_image_content,100,'...')?></div>
						</div>						
					</div>
					<? 				
					$count = 1;
					foreach ( $banners as $banner ) {				
						$banner['src'] = g::thumbnail_from_image_tag( "<img src='$banner[src]'>", bo_table(1), 448, 238);
						?>
						<div class='banner_holder'>
							<a href='<?=$banner['href']?>'>
								<img banner_num = <?=$count?> src='<?=$banner['src']?>'/>
							</a>
							<div class='text_content'>
								<div class = 'banner_subject'>
									<a href='<?=$banner['href']?>'>
										<?=$banner['subject']?>
									</a>
								</div>
								<div class = 'banner_content'>
									<a href='<?=$banner['href']?>'>
										<?=cut_str($banner['content'],100,'...')?>
									</a>
								</div>
							</div>	
						</div>
					<?
					$count++;
					}
					?>
					<div class='banner_holder'>
						<img src='<?=$fake_first_image?>'/>
						<div class='text_content'>						
							<div class = 'banner_subject'><?=$fake_first_image_subject?></div>
							<div class = 'banner_content'><?=cut_str($fake_first_image_content,100,'...')?></div>
						</div>	
					</div>
				</div>			
				<div class='commands'>
					<div class='left_btn button'><img src = '<?=x::url_theme()?>/img/left_btn.png'/></div>
					<div class='button'>
						<img class='stop_btn stop_and_play' src = '<?=x::url_theme()?>/img/stop_btn.png'/>
						<img class='play_btn stop_and_play'src = '<?=x::url_theme()?>/img/play_btn.png'/>
					</div>
					<div class='right_btn button'><img src = '<?=x::url_theme()?>/img/right_btn.png'/></div>
					<div style='clear:both'></div>
				</div>
			</div><!--/inner-->
		</div><!--banner-container-->