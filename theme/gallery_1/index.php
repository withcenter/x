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
		<div class='banner' total_banners="<?=$total_banners?>" >
			<div class='inner' style="position: relative;">
				<?
					 
					if ( $banners ) {
						$selected = 0;
						foreach ( $banners as $banner ) {					
							if ( ! $selected ++ ) $first_image = 'selected';
							else $first_image = '';
							
							if ( !$url = $banner['href'] ) $url = "javascript:void(0)";
							echo "<div class='banner-image-container image_$selected $first_image' image_num='$selected'><div class='banner-image'>";
							echo "<a href='$url' target='_blank'><img src='$banner[src]''></a></div>";
							echo "<div class='banner-content-container'><a href='$url' target='_blank'><span class='banner-content'><p class='banner-text'><div class='banner-subject'>".cut_str(strip_tags($banner['subject']),20,'...')."</div><div class='banner-inner-contents'>".cut_str(strip_tags($banner['content']),260,'...')."</div></p></span></a>";
							echo "<div class='arrow-left-inner'></div>";
							echo "<div class='arrow-left-outer'></div>";
							echo "</div>";
							echo "<a href='$url' class='read-more'>자세히 보기 &gt;</a></div>";
						}
					}
					else {
						for ( $i = 1; $i <= 5 ; $i++) { 
								$no_banners[] = array(
									'src' => x::theme_url('img/no_banner_'.$i.'.png'),
									'subject' => "회원님게서는 현재...",
									'content' => "필고 갤러리 테마 No.1을 선택 하였습니다. <br />
												메인 배너의 이미지는 <a style='font-weight: bold; color:#355c75;' href='".url_site_config()."'>사이트 관리</a>의 일반 설정에서 배너 이미지를 등록 해 주세요."
								);
						}
						$selected = 0;
						foreach ( $no_banners as $banner ) {					
							if ( ! $selected ++ ) $first_image = 'selected';
							else $first_image = '';
							
							$url = "javascript:void(0)";
							echo "<div class='banner-image-container image_$selected $first_image' image_num='$selected'><div class='banner-image'>";
							echo "<a href='$url' target='_blank'><img src='$banner[src]''></a></div>";
							echo "<div class='banner-content-container'><a href='$url' target='_blank'><span class='banner-content'><p class='banner-text'><div class='banner-subject'>".$banner['subject']."</div><div class='banner-inner-contents'>".$banner['content']."</div></p></span></a>";
							echo "<div class='arrow-left-inner'></div>";
							echo "<div class='arrow-left-outer'></div>";
							echo "</div>";
							echo "<a href='$url' class='read-more'>자세히보기 &gt;</a></div>";
						}
					}

					echo "<div style='clear: left'></div>";
					
				?>
			</div>
			<div class='banner-pagination'>
				<? for($i=1; $i<=$total_banners; $i++) {?>
					<a href="javascript:void(0)" class='page_num page_<?=$i?> <? if ($i==1) echo "selected_num"?>' page_num='<?=$i?>'><?=$i?></a>
				<?}?>				
			</div>
		</div>


<div class='gallery-1-posts-with-image'>
	<?=latest('x-latest-gallery-1-posts-with-image', bo_table(1), 4, 20)?>
</div>

<div class='gallery-1-lower-posts'>
		<?=latest('x-latest-gallery-1-lower-posts', bo_table(2), 2, 20)?>
</div>