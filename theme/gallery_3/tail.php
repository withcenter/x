<link rel="stylesheet" href="<?=x::theme_url()?>/css/tail.css">
<script src="<?=x::theme_url()?>/js/tail.js"></script>
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
		</div><!--inner-content-->
	</div><!--content-->
	<div class='footer'>
		<div class='inner-footer'>
			<div class='footer-full-links'>
				<div class='inner' style='postion: relative'>
		
				</div>
			</div>
			<div class='footer-links'>
				<div class='inner-footer-links'>

					<!--default-->
					<span class='site-title'> <?=x::meta('title')?></span>
				
					<div class='menu-links'>
						<ul>
							<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links('left') ) . "</li>"?>
						</ul>
					</div>
					<div class='prev-nav'>
						<img src="<?=x::theme_url('img/footer_prev.gif')?>" class='footer-prev'/>
						<img src="<?=x::theme_url('img/footer_next.gif')?>" class='footer-next'/>
						<a href="javascript:void(0)" style='background: url(<?=x::theme_url('img/footer_view_all.gif')?>) 80px 30px' class='footer-view'/><span>view all</span></a>
					</div>
					
					<!--clicked-->
					<span class='clicked_info'>RELATED SITES</span>
					<a href="javascript:void(0)" style='background: url(<?=x::theme_url('img/footer_view_close.gif')?>) 80px 30px' class='footer-view-clicked'/><span>Close</span></a>
				<div style='clear: left'></div>
			</div>
			</div>
			<div class='footer-menu-copyright'>
				<div class='footer-menu-social'>
					<div class='footer-menu'>
						<ul class='footer-menu-ul'>
							<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links('bottom') ) . "</li>"?>
						</ul>
						<div style="clear: left"></div>
					</div>
				</div>
				<div class='footer-text'>
						<?if ( x::meta('footer_text')) echo nl2br(x::meta('footer_text'));
						else {?>
							<div>회원님께서는 현재 필고 <b style='color:#506ab6;'>모바일 테마</b>를 선택 하셨습니다.</div>
							<div>하단 문구는 사이트 설정에서 수정하실 수 있습니다.</div>
						<?}?>
				</div>
			</div>
		</div><!--inner-footer-->
	</div><!--footer-->
</div><!--layout-->