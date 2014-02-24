
</div>
<div style='clear:both'>&nbsp</div>
<div class='footer-info'>
	<div class='footer-logo'>
		<?if( ms::meta('comfooter_logo') ) $company_banner = ms::meta('img_url').ms::meta('comfooter_logo');
		else $company_banner = x::url_theme().'/img/community_footer_logo.png';?>
		<img src="<?=$company_banner?>">		
	</div>
	<div class='footer-text'>
		<div class='footer-links'>
			<? if( ms::meta('comfooter_about') ) { ?> <a href='<?=g::url()?>/?page=about'>ABOUT</a> <?}?>
			<? if ( ms::meta ('comfooter_terms') ) { ?> <a href='<?=g::url()?>/?page=terms'>TERMS & CONDITIONS</a> <?}?>
			<? if ( ms::meta ('comfooter_privacy') ) { ?> <a href='<?=g::url()?>/?page=privacy'>PRIVACY POLICY</a> <?}?>
			<? if ( ms::meta ('comfooter_faqs') ) { ?> <a href='<?=g::url()?>/?page=faqs'>FAQS</a> <?}?>
		</div>
	<? if( ms::meta('footer_text') == '' ) {?>
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