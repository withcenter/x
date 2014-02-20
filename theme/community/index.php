<script src='<?=x::url_theme()?>/js/banner_rotation.js'></script>
<div class='top-panel'>
	<div style='border: solid 1px #0d98ba; padding: 1px; border-radius: 3px;'>
		<div class='banner'>
			<?
				for ( $i = 1 ; $i <= 5 ; $i++ ) {
					if( !ms::meta( 'combanner_'.$i ) ){
						continue;
					}
					echo "<div class='banner-image image_num_$i'>";
					echo "<img src='".ms::meta('img_url').ms::meta('combanner_'.$i)."'>";
					echo "<p class='banner-text'>".ms::meta('combanner_'.$i.'_text1').ms::meta('combanner_'.$i.'_text2')."</p>";
					echo "</div>";
				}
			?>

		</div>
	</div>
</div>