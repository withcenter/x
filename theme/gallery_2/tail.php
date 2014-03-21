	</div> <!--content-->
	<div class='footer'>
		<table cellspacing='0' cellpadding='0' width='100%'>
			<tr>
				<td valign='top' class='footer-info'>
				<?
					if ( $footer_text = x::meta('footer_text') ) echo nl2br($footer_text);
					else echo "하단 문구를 입력하세요.";
				?>
				</td>
				<td valign='middle' class='footer-logo'>
					<div class='footer-logo-container'>
					<?
						if( file_exists( x::path_file( "gallery_footer_logo" ) ) ) $img = "<img src='".x::url_file('gallery_footer_logo')."' />";
						else {
							$img = "<img src='".x::url_theme()."/img/footer_logo.png' />";
						}
						echo $img;
					?>
					</div>
					<p><? if( $footer_tagline = x::meta('gallery_footer_tagline')) echo $footer_tagline;
						else echo "필리핀 최대 정보 커뮤니티 필고"; ?></p>
				</td>
			</tr>
		</table>
	</div>
</div><!--layout-->