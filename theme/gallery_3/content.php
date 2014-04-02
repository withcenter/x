<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">
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
			<div class='inner'>			
				<div class='banner'>	
					<div class='banner_holder'>
						<img src='<?=$fake_last_image?>'/>
						<div class='text_content'>
							<div class = 'banner_subject'><?=cut_str($fake_last_image_subject,40,'...')?></div>
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
										<?=cut_str($banner['subject'],40,'...')?>
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
							<div class = 'banner_subject'><?=cut_str($fake_first_image_subject,40,'...')?></div>
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
		<div class='lower_commands'>
			<?for( $i = 1; $i <= $total_banners; $i++ ){?>
				<div class='bullet' banner_num='<?=$i?>'>
					<img class='off' src = '<?=x::url_theme()?>/img/change_banner_bottom.png'/>					
					<img class='on' src = '<?=x::url_theme()?>/img/change_banner_bottom_selected.png'/>					
				</div>
			<?}?>
		</div>
<?if ( preg_match('/msie 7/i', $_SERVER['HTTP_USER_AGENT'] ) ) {?>
<style>		
	.banner-container .banner_holder{
		display:inline;
	}
	
	.banner-container .commands .button{
		width:30px;
		float:left;
	}
	
	.content .banner-container img{
		
	}
</style>
<?}?>