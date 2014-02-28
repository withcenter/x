</div>
<div class='footer-text'><p><? if( ms::meta('footer_text') == '' ) {?>
COPYRIGHT @ 2014 &nbsp&nbsp ALL RIGHTS RESERVED &nbsp&nbsp WITHCENTER.COM
<?} else echo ms::meta('footer_text');?>
</p>

</div>

<!--  하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
	
<? if ( write_page() ) { ?>
	CKEDITOR.replace( 'wr_content',
		{
			uiColor : '#F7F7F7',
			toolbar : [
				['Format','Font','FontSize'],
				['Image','Link','-','Table','-','Smiley'],
				['Print','Maximize'],
				['Source'],
				'/',
				['Bold','Italic','Underline','Strike','-','TextColor','BGColor','-','Find','Replace','-','Outdent','Indent'],
				['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
			]
		}
	);
<? } ?>

</script>

<?php
//include_once(G5_PATH."/tail.sub.php");
?>

<style>
body {
	background: url(<?=x::url_theme()?>/img/bg.jpg);
}
</style>


