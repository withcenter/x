</div><!--container-->
<div style='clear:both'></div>
<?	
	if($_SERVER['SCRIPT_NAME'] == '/index.php') {
	?>
	<div class='foot_banner'>
		<?
			if( ms::meta('travel2banner_bottom') ) $img = "<a href='".ms::meta('travel2banner_bottom_text1')."' target='_blank'><img src = '".ms::meta('img_url').ms::meta('travel2banner_bottom')."'/></a>";
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
			if( ms::meta('footer_logo') ) $img = "<img src='".ms::meta('img_url').ms::meta('footer_logo')."' />";
			else {
				$img = "<img src='".x::url_theme()."/img/no_footer_logo.png' />";
			}
		?>
		<?=$img?>
		</div>
		<div class='footer-info'>
			<div class='footer-tagline'>
			<?
				if ( $footer_tagline = ms::meta('travel2footer_tagline') ) echo $footer_tagline;
				else echo "하단 문구 제목을 입력하세요.";
			?>
			</div>
			<div class='footer-text'>
			<?
				if ( $footer_text = ms::meta('footer_text') ) echo nl2br($footer_text);
				else echo "하단 문구를 입력하세요.";
			?>
			</div>
		</div>
	</div>
	<div style='clear: both'></div>
</div>
</div> <!-- layout -->


