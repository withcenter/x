<link rel="stylesheet" href="<?=x::theme_url()?>/css/tail.css">
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
	</div><!--/container-->
	<div class='footer-container'>
		<div class='footer'>
			<div class='footer-contact'>
				<div class='inner'>
					<span class='footer-contact-title contact'>Get In Touch</span>
					<span class='contact'>Do you want to work with us? Call Us</span>
					<span class='footer-number contact'> Tel. No.: <?if ( $contact_number = x::meta('mobile_contact_number') ) echo $contact_number; else echo "(070) 7259 1749" ?> </span>
					<span class='footer-email contact'>Email Add: <?if ( $contact_email = x::meta('mobile_contact_email') ) echo $contact_email; else echo "username@email.com" ?></span>
				</div>
			</div>
			<div class='footer-text'>
				<div class='inner'>
					<span class='footer_links_web'>사이트 견적 및 제작의뢰  &nbsp&nbsp&nbsp    로고, 배너 제작 의뢰  &nbsp&nbsp&nbsp     사이트 갤러리   &nbsp&nbsp&nbsp    템플릿 갤러리   &nbsp&nbsp&nbsp   질문과 답변 </span>
					<span class='copyright'>Copyright © 2007 ~ 2014 All Rights Reserved by WithCenter</span>
					
					<div class='footer_links_mobile'>
						<div class='footer_links_left'><div class='inner'><span>사이트 견적 및제작의뢰</span> <span>로고, 배너 제작 의뢰</span> <span>사이트 갤러리</span> <span>템플릿 갤러리</span></div></div>
						<div class='footer_links_right'><div class='inner'><span>질문과 답변</span> <span>로그인</span> <span>회원가입</span></div></div>
						<div style='clear: both'></div>
					</div>
				</div>
			</div>
			<div style='clear: left'></div>
			<span class='copyright-mobile'>Copyright © 2007 ~ 2014 All Rights Reserved by WithCenter</span>
		</div>
	</div>
</div><!--/layout-->