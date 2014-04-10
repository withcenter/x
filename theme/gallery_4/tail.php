		</div><!--content-->
	</div><!--content-wrapper-->
	
	<div class='footer-wrapper'>
		<div class='footer'>
			<div class='footer-logo'>
				<div class='inner'>
					<img src="<?=x::theme_url('img/footer_logo_default.png')?>"/>
				</div>
			</div>
			<div class='footer-right'>
				<div class='inner'>
					<div class='footer-menu'>
						<ul>
							<?="<li>" . implode( "</li><li>", x::menu_links('bottom') ) . "</li>"?>
						</ul>
						<div style='clear: left'></div>
					</div>
					<div class='footer-text'>
						<?if ( x::meta('footer_text')) echo nl2br(x::meta('footer_text'));
						else {?>
							<div>회원님께서는 현재 필고 <b style='color:#506ab6;'>갤러리 테마 No.3</b>을 선택 하셨습니다.</div>
							<div>하단 문구는 사이트 설정에서 수정하실 수 있습니다.</div>
						<?}?>					
					</div>
				</div>
			</div>
			<div style='clear: left'></div>
		</div>
	</div>
	</div><!--inner_layout-->
</div><!--layout-->


<link rel="stylesheet" href="<?=x::theme_url('css/after.css')?>">