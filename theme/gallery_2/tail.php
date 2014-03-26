	</div> <!--content-->
	<div class='footer'>
		<table cellspacing='0' cellpadding='0' width='100%'>
			<tr>
				<td valign='top' class='footer-info'>
				<?
					if ( $footer_text = x::meta('footer_text') ) echo nl2br($footer_text);
					else echo "
						회원님께서는 현재 필고 <b style='color: #45b29d;'>갤러리 테마 NO 2</b>를 사용 중 입니다. <br />
						 하단 문구는 어드민 페이지에서 변경 하실 수 있습니다.<br /><br /><br />
						 <a style='color: #ffffff;' href='".url_site_config()."'>사이트 설정</a>
					";
				?>
				</td>
				<td valign='middle' class='footer-logo'>
					<div class='footer-logo-container'>
					<? echo "<a href='http://www.philgo.com' target='_blank'><img style='border:0;' src='".x::url_theme()."/img/footer_logo.png' /></a>";?>
					</div>
					<p>필리핀 최대 정보 커뮤니티 필고</p>
				</td>
			</tr>
		</table>
	</div> 
</div><!--layout-->