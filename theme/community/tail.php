
</div>

<div class='footer-info'>
	<div class='footer-logo'>
		<?if( ms::meta('comfooter_logo') ) $company_banner = ms::meta('img_url').ms::meta('comfooter_logo');
		else $company_banner = x::url_theme().'/img/community_footer_logo.png';?>
		<img src="<?=$company_banner?>">		
	</div>
	<div class='footer-text'>
	<? if( ms::meta('footer_text') == '' ) {?>
			<div class='footer-links'><a href='#'>ABOUT</a><a href='#'>TERMS & CONDITIONS</a><a href='#'>PRIVACY POLICY</a><a href='#'>FAQS</a></div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>COPYRIGHT @ 2014 &nbsp&nbsp ALL RIGHTS RESERVED &nbsp&nbsp WITHCENTER.COM
	<?} else echo ms::meta('footer_text');?>
	</div>
</div>

<!--  하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?debug::mode(0)?>