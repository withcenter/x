<link rel="stylesheet" href="<?=x::theme_url()?>/css/tail.css">
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
	</div><!--/container-->
	<div class='footer-container'>
		<div class='footer'>
			<div class='footer-contact'>
				<div class='inner'>
					<span class='footer-contact-title'>Get In Touch</span>
					<span>Do you want to work with us? Call Us</span>
					<span class='footer-number'> Tel. No.: <?if ( $contact_number = x::meta('mobile_contact_number') ) echo $contact_number; else echo "(070) 7259 1749" ?> </span>
					<span class='footer-email'>Email Add: <?if ( $contact_email = x::meta('mobile_contact_email') ) echo $contact_email; else echo "username@email.com" ?></span>
				</div>
			</div>
			<div class='footer-text'>
				<div class='inner'>
					<span>사이트 견적 및 제작의뢰  &nbsp&nbsp&nbsp    로고, 배너 제작 의뢰  &nbsp&nbsp&nbsp     사이트 갤러리   &nbsp&nbsp&nbsp    템플릿 갤러리 질문과 답변 </span>
					<span class='copyright'>Copyright © 2007 ~ 2014 All Rights Reserved by WithCenter</span>
				</div>
			</div>
			<div style='clear: left'></div>
		</div>
	</div>
</div><!--/layout-->