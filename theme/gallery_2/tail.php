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
					<img src="<?=x::theme_url('img/footer_logo.png')?>"/>
					<p>필리핀 최대 정보 커뮤니티 필고</p>
				</td>
			</tr>
		</table>
	</div>
</div><!--layout-->