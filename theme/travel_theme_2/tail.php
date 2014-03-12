</div><!--container-->
<div style='clear:both'></div>
<?	
	if($_SERVER['SCRIPT_NAME'] == '/index.php') {
	?>
	<div class='foot_banner'>
		<?
			if( file_exists( x::path_file( "travel_bottom_banner" ) ) ) $img = "<a href='".ms::meta('travel_bottom_banner_url')."' target='_blank'><img src = '".x::url_file(  "travel_bottom_banner" )."'/></a>";
			else {
				$img = "<a href='javascript:void(0)'><img src='".x::url_theme()."/img/no_bottom_banner.png' /></a>";
			}
		?>
		<?=$img?>
	</div>
	<?}?>
</div> <!-- inner -->
<div class='footer-wrapper'>	
	<div class='footer'>
		<div class='footer-logo'>		
		<?php
			if( file_exists( x::path_file( "travel_footer_logo" ) ) ) $img = "<img src='".x::url_file('travel_footer_logo')."' />";
			else {
				$img = "<img src='".x::url_theme()."/img/no_footer_logo.png' />";
			}
		?>
		<?=$img?>
		</div>
		<div class='footer-info'>
			<div class='footer-tagline'>
			<?
				if ( $footer_tagline = x::meta('travel_2footer_tagline') ) echo $footer_tagline;
				else echo "하단 문구 제목을 입력하세요.";
			?>
			</div>
			<div class='footer-text'>
			<?
				if ( $footer_text = x::meta('footer_text') ) echo nl2br($footer_text);
				else echo "하단 문구를 입력하세요.";
			?>
			</div>
		</div>
	</div>
	<div style='clear: both'></div>
</div>
</div> <!-- layout -->


