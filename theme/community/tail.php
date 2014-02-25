
</div>
<div style='clear:both'></div>
</div>
<div class='footer-info'><div class='inner'>
	<?php 
		if( ms::meta('footer_text') ) { 
			echo nl2br(ms::meta('footer_text'));
		} else echo '어드민 페이지에서 하단 메세지를 입력 해 주세요.';
	?>
</div></div>

<!--  하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?debug::mode(0)?>