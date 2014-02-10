</div>
<div class='footer-text'><p><? if( $extra['footer_text'] == '' ) {?>
COPYRIGHT @ 2014 &nbsp&nbsp ALL RIGHTS RESERVED &nbsp&nbsp WITHCENTER.COM
<?} else echo $extra['footer_text'];?>
<a href=''>DISCLOSURE POLICY</a><a href=''>PRIVACY POLICY</a>
</p>
</div>

<!--  하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
//include_once(G5_PATH."/tail.sub.php");
?>

<style>
body {
	background: url(<?=x::url_theme()?>/img/bg.jpg);
}
</style>